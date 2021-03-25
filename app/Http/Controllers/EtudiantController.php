<?php
/*
|--------------------------------------------------------------------------
| Projet Portfolio
|--------------------------------------------------------------------------
|
| Author: Guillaume Pelletier
| Subject: Controller de l'administration / de l'étudiant
|
| Date de création: 22/03/2021
|
*/

namespace App\Http\Controllers;

use App\Models\Competence;
use App\Models\Etudiant;
use App\Models\Realisation;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    /**
     * @author: Guillaume Pelletier
     * @link: /
     * @subject: Afficher la zone d'administration
     * @name: afficherAdmin
     * @paramIn: -
     * @paramOut: La view pour afficher l'administration
     */
    public function afficherAdmin()
    {
        $tousLesEtudiants = Etudiant::all();
        $toutesLesCompetences = Competence::all();
        $toutesLesRealisations = Realisation::all();
        
        return view('etudiantAdmin')->with('tousLesEtudiants', $tousLesEtudiants)
                                    ->with('toutesLesCompetences', $toutesLesCompetences)
                                    ->with('toutesLesRealisations', $toutesLesRealisations);    
    }
}
