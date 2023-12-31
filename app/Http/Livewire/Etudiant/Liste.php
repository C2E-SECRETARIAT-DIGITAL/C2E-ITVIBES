<?php

namespace App\Http\Livewire\Etudiant;

use App\Models\Etudiant;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Route;

class Liste extends Component
{
    use WithPagination;

    public $searchName ='';
    public $searchMaticule = '';
    public $searchStatus = '';
    public $routeName = "";
    
    public function render()
    {
        $this->routeName = Route::currentRouteName();
        return view('livewire.etudiant.liste', [
            'etudiants'  => Etudiant::where('nom', 'LIKE', "%{$this->searchName}%")
                                ->Where('matricule', 'LIKE', "%{$this->searchMaticule}%")
                                ->orderBy('created_at', 'DESC')
                                ->paginate(6),

            'etudiant_entree'  => Etudiant::where('entree', true)->count(),
            'etudiant_non_entree'  => Etudiant::all()->count()
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
