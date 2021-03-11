<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class enregistrement extends Model
{
    use HasFactory;
    protected $table = 'enregistrement';
    public $timestamps = false;
    protected $fillable = ['idRecruteur','idCompetence'];
}
