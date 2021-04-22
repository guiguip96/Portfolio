<?php
/*
|--------------------------------------------------------------------------
| Projet Portfolio
|--------------------------------------------------------------------------
|
| Author: Guillaume Pelletier
| Subject: Controller des réalisations
|
| Date de création: 22/03/2021
|
*/

namespace App\Http\Controllers;

use App\Models\Competence;
use App\Models\Realisation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RealisationController extends Controller
{
    public function ajouterRealisation()
    {
        return view('realisationAdmin');
    }

    /**
     * @author: Guillaume Pelletier
     * @link: (url ou git ou rien)
     * @subject: Modifier une réalisation
     * @name: modifierRealisation
     * @param In: L'id de la réalisation
     * @param Out: La view pour modifier la réalisation
     */
    public function modifierRealisation($id)
    {
        $uneRealisation = Realisation::find($id);

        return view('realisationModifier')->with('uneRealisation', $uneRealisation); 
    }

    /**
     * @author: Guillaume Pelletier
     * @link: (url ou git ou rien)
     * @subject: Afficher les détails d'une réalisation
     * @name: afficherDetailsRealisation
     * @param In: L'id de la réalisation
     * @param Out: La view pour afficher les détails de la réalisation
     */
    public function afficherDetailsRealisation($id)
    {
        $uneRealisation = Realisation::find($id);

        if(Auth::user() != null){
            if(Auth::user()->role == 'etudiant')
                return view('realisationDetailsAdmin')->with('uneRealisation', $uneRealisation);
            else
                return view('realisationDetailsClient')->with('uneRealisation', $uneRealisation);
        }
        else
            return view('realisationDetailsClient')->with('uneRealisation', $uneRealisation);    
    }

    /**
     * @author: Guillaume Pelletier
     * @link: (url ou git ou rien)
     * @subject: Supprimer une réalisation
     * @name: supprimerRealisation
     * @param In: L'id de la réalisation
     * @param Out: La suppression de la réalisation
     */
    public function supprimerRealisation($id)
    {
        $uneRealisation = Realisation::find($id);
        $uneRealisation->delete();
        return redirect()->route('etudiant.afficher')->with('message','Réalisation supprimée avec succès');
    }

    /**
     * @author: Guillaume Pelletier
     * @link: (url ou git ou rien)
     * @subject: Création d'une réalisation
     * @name: enregistrerRealisation
     * @param In: Les champs du formulaire remplis
     * @param Out: Une nouvelle réalisation
     */
    public function enregistrerRealisation(Request $request)
    {
        $request->validate
        ([
            'nomRealisation' => ['required', 'min:3', 'max:20' ],
            'description' => ['required', 'min:10', 'max:200' ],
            'idEtudiant' => ['required', 'min:1', 'max:200' ],
        ]);
        $uneRealisation = Realisation::firstOrNew(['id'=>$request->input('id')]);
        $uneRealisation->nomRealisation = $request->input('nomRealisation');
        $uneRealisation->description = $request->input('description');
        $uneRealisation->idEtudiant = $request->idEtudiant;
        $uneRealisation->save();
        return redirect()->route('etudiant.afficher')->with('message','Réalisation enregistrée avec succès');
    }
}
