<?php

namespace App\Http\Livewire\Etudiant;

use App\Models\etudiant;
use Livewire\Component;
use Livewire\WithPagination;

class Liste extends Component
{
    use WithPagination;

    public $searchName ='';
    public $searchMaticule = '';
    public $searchStatus = '';
    
    public function render()
    {
        return view('livewire.etudiant.liste', [
            'etudiants'  => etudiant::where('nom', 'LIKE', "%{$this->searchName}%")
                                ->Where('matricule', 'LIKE', "%{$this->searchMaticule}%")
                                ->orderBy('created_at', 'DESC')
                                ->paginate(6),

            'etudiant_restaurer'  => etudiant::where('restauration', true)->count(),
            'etudiant_non_restaurer'  => etudiant::all()->count()
        ]);
    }
    
    public function updatingRestaure()
    {
        $this->restaure = true ;
    }
    

    public function getTicket(int $id )
    {
        $etudiant = etudiant::find($id);

        dd($etudiant);
    }
}
