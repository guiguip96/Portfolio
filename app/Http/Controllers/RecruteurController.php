<?php

namespace App\Http\Controllers;

use App\Models\Recruteur;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class RecruteurController extends Controller
{
    /**
     * @author: Guillaume Pelletier
     * @link: (url ou git ou rien)
     * @subject: L'ajout d'une nouvelle compétence
     * @name: enregistrerCompetence
     * @param In: Les champs du formulaire remplis
     * @param Out: Une nouvelle compétence
     */
    public function afficherProfil(){

        $id = Auth::user()->id;
        $unUser = User::find(Auth::user()->id);
        $unRecruteur = Recruteur::where('idUser', '=', $id)->first();

        if(Auth::user()->id == $id){
            return view('profil')->with('unUser', $unUser)
                                 ->with('unRecruteur', $unRecruteur);
        }

        return abort(403, trans('get fucked'));
    }

    /**
     * @author: Guillaume Pelletier
     * @link: (url ou git ou rien)
     * @subject: L'ajout d'une nouvelle compétence
     * @name: enregistrerCompetence
     * @param In: Les champs du formulaire remplis
     * @param Out: Une nouvelle compétence
     */
    public function enregistrerRecruteur(Request $request)
    {

        $request->validate
        ([
            'prenom' => ['required', 'max:25' ],
            'nom' => ['required', 'max:25' ],
            'adresse' => ['required','max:40' ],
            'codePostal' => ['required', 'max:6' ],
            'ville' => ['required', 'max:25' ],
            'telephone' => ['required', 'max:15' ],
            'courriel' => ['required', 'max:40' ],
            'compagnie' => ['required', 'max:40' ],
            'idUser' => ['required', 'max:40' ],
        ]);
        
        $unRecruteur = Recruteur::firstOrNew(['idUser'=>$request->input('idUser')]);
        $unRecruteur->prenom = $request->input('prenom');
        $unRecruteur->nom = $request->input('nom');
        $unRecruteur->adresse = $request->input('adresse');
        $unRecruteur->codePostal = $request->input('codePostal');
        $unRecruteur->ville = $request->input('ville');
        $unRecruteur->telephone = $request->input('telephone');
        $unRecruteur->courriel = $request->input('courriel');
        $unRecruteur->compagnie = $request->input('compagnie');
        $unRecruteur->save();
        return redirect()->route('home')->with('message','Modifications enregistrées avec succès!');
    }
}
