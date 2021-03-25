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
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    /**
     * @author: Guillaume Pelletier
     * @link: /
     * @subject: Afficher la zone d'administration
     * @name: afficherAdmin
     * @param In: -
     * @param Out: La view pour afficher l'administration
     */
    public function afficherAdmin()
    {
        $tousLesEtudiants = Etudiant::all();
        $toutesLesCompetences = Competence::all();
        $toutesLesRealisations = Realisation::all();

        if(Auth::user()->type == 'etudiant'){
            return view('etudiantAdmin')->with('tousLesEtudiants', $tousLesEtudiants)
                                    ->with('toutesLesCompetences', $toutesLesCompetences)
                                    ->with('toutesLesRealisations', $toutesLesRealisations); 
        }
        return abort(403, trans('get fucked'));
    }
}
