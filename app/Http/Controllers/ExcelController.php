<?php

namespace App\Http\Controllers;

use App\Imports\EtudiantsImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


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
        
        Excel::import(new EtudiantsImport,$request->import_file);

        $request->session()->flash('success', 'Mise à jour éffectuée');
           
        return back();
    }
}
