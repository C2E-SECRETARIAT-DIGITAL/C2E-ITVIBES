<?php

namespace App\Exports;

use App\Models\Etudiant;
use Maatwebsite\Excel\Concerns\FromCollection;

class EtudiantsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Etudiant::all();
    }

    public function headings(): array
    {
        return [
            'Matricule',
            'Nom',
            'Prenoms',
            'Filere',
            'Email',
            'Contacts'
        ];
    }

    public function map($etudiant): array
    {
        return [
            $etudiant->matricule,
            $etudiant->nom,
            $etudiant->prenoms,
            $etudiant->filiere,
            $etudiant->email,
            $etudiant->contacts
        ];
    }
}
