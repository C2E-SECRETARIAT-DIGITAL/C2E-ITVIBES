<?php

namespace App\Http\Controllers;

use App\Exports\EtudiantsExport;
use App\Imports\EtudiantsImport;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use DB;


class ExcelController extends Controller
{
    public function index()
    {
        return view('vibes.excel');
    }
    
    public function importExcel(Request $request) 
    {
        $request->validate([
            'import_file' => 'required'
        ]);
        try {
            Excel::import(new EtudiantsImport,$request->import_file);
            $request->session()->flash('success', 'Mise à jour éffectuée');

        } catch (\Throwable $th) {
            $request->session()->flash('error', 'Vérifier que le fichier est conforme au modèle et ne contient pas de doublons.');
        }
        

           
        return back();
    }

    public function exportExcel($type) 
    {
        return Excel::download(new EtudiantsExport, 'ItVibes2021.'.$type);
    }

    public function DeleteAllStudent(Request $request)
    {
        // Etudiant::truncate();
        DB::table('etudiants')->delete();  

        $request->session()->flash('Warning', 'Suppression effectuée');
        return redirect()->back();
    }
}
