<?php

namespace App\Http\Controllers;

use App\Mail\TicketMail;
use App\Models\Etudiant;
use App\Models\Filiere;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vibes.caisse.Liste');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $filieres = Filiere::pluck('name', 'id');
        return view('vibes.caisse.StudentCreate', compact('filieres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validateData = request()->validate([
            'nom' => 'required',
            'prenoms' => 'required',
            'filiere' => 'required',
            'email' => 'required|unique:etudiants|email'
        ]);
        
        $et = etudiant::create($validateData);
        $et->matricule = 'ITPAIYA-' . $this->generateRandomString(8);
        $et->tombola = $this->generateNumberTombola();
        $et->save();

        // ici on met le message de confirmation en session
        $request->session()->flash('success', 'Enregistrement effectué avec succès');

        // Test si l'envoie de mail ne fonctionne pas

        $this->sendTicketMail($et);
        
        return redirect()->back();
        
    }

    public function deleteEtudiant(Request $request, $id){
        $et = Etudiant::find($id);

        if ($et) {
            $et->delete();
            $request->session()->flash('success', 'Suppression effectuée');
            return redirect()->back();
        } else {
            $request->session()->flash('error', 'Suppression échouée');
        }
    }
    
    public function Soumission(Request $request)
    {
        $codeDecrypte = Crypt::decryptString($request->qrcodeValue);

        
        $etudiant = Etudiant::where('matricule', $codeDecrypte)->first();
        // dd($etudiant);

        if(!$etudiant->entree)
        {
            $etudiant->entree = true ;
            $etudiant->save();

            $request->session()->flash('success', 'Bienvenue à l\'IT PAIYA 2024');
        }
        else{
            $request->session()->flash('error', 'Déjà scanné !!!');
        }
        return redirect()->back();
    }

    public function generatePDF(int $id)
    {
        $etudiant = etudiant::find($id);    
        $m = Crypt::encryptString($etudiant->matricule);
        
        $qr = base64_encode(QrCode::format('svg')->size(105)->errorCorrection('H')->generate($m));
       
        $tombola = $etudiant->tombola;
        if($tombola < 10){
            $tombola = '00' . $tombola;
        } elseif ($tombola < 100) {
            $tombola = '0' . $tombola;
        }

        $data = [
            'title' => 'IT-PAIYA',
            'date' => date('d-m-Y à h:i:s A'),
            'nom' => $etudiant->nom,
            'prenoms' => $etudiant->prenoms,
            'tombola' => $tombola,
            'qr_code' => $qr
        ];
          
        $pdf = PDF::loadView('vibes.Ticket', $data);        
        // return view('vibes.Ticket', $data);
    
        return $pdf->download($etudiant->nom.' '.$etudiant->prenoms.'.pdf');

    }

    static public function sendTicketMail($etudiant)
    {   
        $maildata = [
            'title' => 'Ticket IT PAIYA 2024',
            'etudiant' => $etudiant
        ];

        $m = Crypt::encryptString($etudiant->matricule);
        $qr = base64_encode(QrCode::format('svg')->size(110)->errorCorrection('H')->generate($m));

        $tombola = $etudiant->tombola;
        if($tombola < 10){
            $tombola = '00' . $tombola;
        } elseif ($tombola < 100) {
            $tombola = '0' . $tombola;
        }

        $data = [
            'title' => 'IT-PAIYA',
            'date' => date('d-m-Y à h:i:s A'),
            'nom' => $etudiant->nom,
            'prenoms' => $etudiant->prenoms,
            'tombola' => $tombola,
            'qr_code' => $qr
        ];

        $pdf_name = $etudiant->nom.' '.$etudiant->prenoms.'.pdf';
          
        $pdf = PDF::loadView('vibes.Ticket', $data);

        $email = $etudiant->email;

        // return view('emails.TicketMail');
        Mail::to($email)->send(new TicketMail($maildata, $pdf, $pdf_name));

         
    }

    public function sendTicket($id, Request $request)
    {   
        $et = etudiant::find($id);
        try {
            $this->sendTicketMail($et);
            $request->session()->flash('success', 'Email envoyé avec succès.');

        } catch (\Throwable $th) {
            $request->session()->flash('error', 'Envoie de l\'email impossible.');
        }
        return redirect()->back();
    }

    static function generateRandomString($length = 10) {
        return substr(str_shuffle(str_repeat($x='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }

    static function generateNumberTombola(){
        $tombola = 0;
        do {
            $tombola = rand(1, 200);
            $tombola_exist = etudiant::where('tombola', $tombola)->first() != null;
        } while ($tombola_exist);
        return $tombola;
    }
}
