<?php
/*
|--------------------------------------------------------------------------
| Projet Portfolio
|--------------------------------------------------------------------------
|
| Author: Guillaume Pelletier
| Subject: Controller des compétences
|
| Date de création: 22/03/2021
|
*/

namespace App\Http\Controllers;

use App\Models\Competence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CompetenceController extends Controller
{
    public function ajouterCompetence()
    {
        return view('competenceAdmin');
    }


    /**
     * @author: Guillaume Pelletier
     * @link: (url ou git ou rien)
     * @subject: Modifier une compétence
     * @name: modifierCompetence
     * @param In: L'id de la compétence
     * @param Out: La view pour modifier la compétence
     */
    public function modifierCompetence($id)
    {
        $uneCompetence = Competence::find($id);
        return view('competenceModifier')->with('uneCompetence', $uneCompetence); 
    }

    /**
     * @author: Guillaume Pelletier
     * @link: (url ou git ou rien)
     * @subject: Afficher les détails d'une compétence choisie
     * @name: afficherDetailsCompetence
     * @param In: L'id de la compétence
     * @param Out: La view affichant toutes les informations de la compétence
     */
    public function afficherDetailsCompetence($id)
    {
        $uneCompetence = Competence::find($id);

        if(Auth::user() != null){
            if(Auth::user()->role == 'etudiant')
                return view('competenceDetailsAdmin')->with('uneCompetence', $uneCompetence);
            else
                return view('competenceDetailsClient')->with('uneCompetence', $uneCompetence);
        }
        else
            return view('competenceDetailsClient')->with('uneCompetence', $uneCompetence);    
    }

    /**
     * @author: Guillaume Pelletier
     * @link: (url ou git ou rien)
     * @subject: Supprimer une compétence
     * @name: supprimerCompetence
     * @param In: L'id de la compétence
     * @param Out: La suppression de la compétence choisie
     */
    public function supprimerCompetence($id)
    {
        $unCompetence = Competence::find($id);
        $unCompetence->delete();
        return redirect()->route('etudiant.afficher')->with('message','Compétence supprimée avec succès');
    }

    /**
     * @author: Guillaume Pelletier
     * @link: (url ou git ou rien)
     * @subject: L'ajout d'une nouvelle compétence
     * @name: enregistrerCompetence
     * @param In: Les champs du formulaire remplis
     * @param Out: Une nouvelle compétence
     */
    public function enregistrerCompetence(Request $request)
    {
        $request->validate
        ([
            'nomCompetence' => ['required', 'min:3', 'max:50' ],
            'description' => ['required', 'min:10', 'max:200' ],
            'idEtudiant' => ['required', 'min:1', 'max:5' ],
        ]);
        $unCompetence = Competence::firstOrNew(['id'=>$request->input('id')]);
        $unCompetence->nomCompetence = $request->input('nomCompetence');
        $unCompetence->description = $request->input('description');
        $unCompetence->idEtudiant = $request->input('idEtudiant');
        $unCompetence->save();
        return redirect()->route('etudiant.afficher')->with('message','Compétence enregistrée avec succès');
    }
}
