<?php

namespace App\Http\Livewire\Etudiant;

use Livewire\Component;

class Qrcode extends Component
{

    public $qrcodeValue = '' ;
    
    public function render()
    {
        return view('livewire.etudiant.qrcode');
    }

    public function Soumission()
    {
        dd($this->qrcodeValue);
    }
    
}
