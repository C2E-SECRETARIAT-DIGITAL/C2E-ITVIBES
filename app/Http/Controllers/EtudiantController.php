<?php

namespace App\Http\Controllers;

use App\Mail\TicketMail;
use App\Models\Etudiant;
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
        return view('vibes.caisse.StudentCreate');
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
            'contacts' => 'required',
            'matricule' => 'required|unique:etudiants,matricule',
            'filiere' => 'required',
            'email' => 'required|email'
        ]);
        
        
        $et = etudiant::create($validateData);

        // ici on met le message de confirmation en session
        $request->session()->flash('success', 'Enregistrement effectué avec succès');

        // Test si l'envoie de mail ne fonctionne pas


        $this->sendTicketMail($et);
        
        return redirect()->back();
        
    }

    public function Soumission(Request $request)
    {
        $codeDecrypte = Crypt::decryptString($request->qrcodeValue);
        
        $etudiant = Etudiant::where('matricule', $codeDecrypte)->first();

        if(!$etudiant->restauration)
        {
            $etudiant->restauration = true ;
            $etudiant->save();

            $request->session()->flash('success', 'Bienvenue !!');
        }
        else{
            $request->session()->flash('error', 'QR-Code déjà scanné');
        }
        
        return redirect()->back();
    }

    public function generatePDF(int $id)
    {
        $etudiant = etudiant::find($id);    
        $m = Crypt::encryptString($etudiant->matricule);
        
        $qr = base64_encode(QrCode::format('svg')->size(200)->errorCorrection('H')->generate($m));
       
        $data = [
            'title' => 'IT-VIBES',
            'date' => date('d-m-Y à h:i:s A'),
            'person' => $etudiant->nom.' '.$etudiant->prenoms,
            'qr_code' => $qr
        ];
          
        $pdf = PDF::loadView('vibes.Ticket', $data);        
        // return view('vibes.Ticket', $data);
    
        return $pdf->download($etudiant->nom.' '.$etudiant->prenoms.'.pdf');

    }

    public function sendTicketMail($etudiant)
    {   
        $maildata = [
            'title' => 'Ticket IT VIBES 2024',
            'etudiant' => $etudiant
        ];

        $m = Crypt::encryptString($etudiant->matricule);
        $qr = base64_encode(QrCode::format('svg')->size(200)->errorCorrection('H')->generate($m));

        $data = [
            'title' => 'IT-VIBES',
            'date' => date('d-m-Y à h:i:s A'),
            'person' => $etudiant->nom.' '.$etudiant->prenoms,
            'qr_code' => $qr
        ];

        $pdf_name = $etudiant->nom.' '.$etudiant->prenoms.'.pdf';
          
        $pdf = PDF::loadView('vibes.Ticket', $data);

        $email = $etudiant->email;
        // return view('emails.TicketMail');
        Mail::to($email)->send(new TicketMail($maildata, $pdf, $pdf_name));

         
    }

    public function test($id)
    {   
        $et = etudiant::find($id);
        $this->sendTicketMail($et);
    }
}
