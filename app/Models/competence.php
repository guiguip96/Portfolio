<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class competence extends Model
{
    use HasFactory;
    protected $table = 'competence';
    public $timestamps = false;

    protected $fillable = [
        'nomCompetence',
        'description',
        'idEtudiant'
    ];
}
