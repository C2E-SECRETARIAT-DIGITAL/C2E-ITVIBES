<?php

namespace App\Imports;

use App\Models\Etudiant;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Http\Controllers\EtudiantController;

class EtudiantsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        $et = new Etudiant;

        $et->matricule = 'ITVIBES-' . Etudiantcontroller::generateRandomString(8);
        $et->tombola = EtudiantController::generateNumberTombola();
        $et->nom = $row[0];
        $et->prenoms = $row[1];
        $et->filiere = $row[2];
        $et->email = $row[3];
        
        $et->save();
        return $et;
    }
}
