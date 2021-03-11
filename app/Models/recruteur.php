<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recruteur extends Model
{
    use HasFactory;
    protected $table = 'recruteur';
    public $timestamps = false;
    protected $fillable = ['prenom','nom','adresse','codePostal', 'ville', 'telephone','courriel','compagnie','idUser'];
}
