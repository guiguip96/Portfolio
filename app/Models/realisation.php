<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Realisation extends Model
{
    use HasFactory;
    protected $table = 'realisation';
    public $timestamps = false;
    protected $fillable = ['nomRealisation','description','idEtudiant', 'idCompetence'];

}
