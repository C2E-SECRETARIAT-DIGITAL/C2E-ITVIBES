<?php

namespace App\Imports;

use App\Models\Etudiant;
use Maatwebsite\Excel\Concerns\ToModel;

class EtudiantsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Etudiant([
            'matricule'     => $row[0],
            'nom'    => $row[1], 
            'prenoms'    => $row[2],
            'niveau'    => $row[3], 
            'filiere'    => $row[4],
            'email'    => $row[5],
            'contacts'    => $row[6], 
        ]);
    }
}
