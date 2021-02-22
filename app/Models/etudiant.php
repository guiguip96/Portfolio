<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class etudiant extends Model
{
    use HasFactory;
    protected $table = 'etudiant';
    public $timestamps = false;

    protected $fillable = [
        'prenom',
        'nom',
        'adresse',
        'codePostal', 
        'ville', 
        'telephone',
        'courriel',
        'biographie',
        'idUser'
    ];
}
