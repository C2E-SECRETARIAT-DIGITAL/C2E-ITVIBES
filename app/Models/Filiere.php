<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    protected $fillable = ['name'];

    public function etudiants()
    {
        return $this->hasMany(User::class, 'filiere', 'name');
    }

    use HasFactory;
}
