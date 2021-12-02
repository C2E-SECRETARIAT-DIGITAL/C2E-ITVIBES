<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
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
        
        

       return redirect()->back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function show(Etudiant $etudiant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function edit(Etudiant $etudiant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Etudiant $etudiant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etudiant $etudiant)
    {
        //
    }

    public function Soumission(Request $request)
    {
        $codeDecrypte = Crypt::decryptString($request->qrcodeValue);
        
        $etudiant = Etudiant::where('matricule', $codeDecrypte)->first();

        if(!$etudiant->restauration)
        {
            $etudiant->restauration = true ;
            $etudiant->save();

            $request->session()->flash('success', 'Bon appetit');
        }
        else{
            $request->session()->flash('error', 'Déjà restauré');
        }
        
        return redirect()->back();
    }

    public function generatePDF(int $id)
    {

        $etudiant = etudiant::find($id);
        
        
        $m = Crypt::encryptString($etudiant->matricule);
        $t = Crypt::decryptString($m);
        //$qr = base64_encode(QrCode::format('svg')->size(250)->errorCorrection('H')->generate($m));

        $qr = base64_encode(QrCode::format('svg')->size(200)->errorCorrection('H')->generate($m));
        $data = [
            'title' => 'IT-VIBES',
            'date' => date('d-m-Y à h:i:s A'),
            'person' => $etudiant->nom.' '.$etudiant->prenoms,
            'qr_code' => $qr
        ];
          
        $pdf = PDF::loadView('vibes.Ticket', $data);
    
        return $pdf->download($etudiant->nom.' '.$etudiant->prenoms.'.pdf');

        // return $pdf->stream($etudiant->nom.' '.$etudiant->prenoms.'.pdf');
    }
}
