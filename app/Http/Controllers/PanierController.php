<?php

namespace App\Http\Controllers;

use App\Models\Competence;
use App\Models\Etudiant;
use App\Models\PanierTalent;
use App\Models\Realisation;
use App\Models\Recruteur;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class PanierController extends Controller
{
    public function afficherPanier()
    {
        if(Auth::user() != null){
            $emailRecruteur = Auth::user()->email;
            $unRecruteur = Recruteur::where('courriel', $emailRecruteur)->first();
            $toutLePanier = PanierTalent::where('idRecruteur', '=', $unRecruteur->id)
                                        ->join('competence', 'paniertalent.idCompetence', '=' , 'competence.id')
                                        ->get();

            return view('panier')->with('toutLePanier', $toutLePanier);
        }
        else
            return view('auth/login');  
    }

    public function ajouterAuPanier($id)
    {
        if(Auth::user() != null){

            $uneCompetence = Competence::find($id);
            $emailRecruteur = Auth::user()->email;
            $unRecruteur = Recruteur::where('courriel', $emailRecruteur)->first();

            //Si la compétence qu'on veux ajouter au panier s'y trouve déja
            if(PanierTalent::where('idRecruteur', '=', $unRecruteur->id)->where('idCompetence', '=', $uneCompetence->id)->first() != null){

                //On affiche un message d'erreur indiquant qu'elle y est déja
                //
                //

            }
            else{

                //Sinon, on ajoute le voyage dans le panier du client
                $lePanier = PanierTalent::firstOrNew(['id'=>0]);
                $lePanier->idRecruteur = $unRecruteur->id;
                $lePanier->idCompetence = $uneCompetence->id;
                $lePanier->save();
            } 

            $toutLePanier = PanierTalent::where('idRecruteur', '=', $unRecruteur->id)
                                            ->join('competence', 'paniertalent.idCompetence', '=' , 'Competence.id')
                                            ->get();

            return view('panier')->with('toutLePanier', $toutLePanier);

        }
        else
           return view('auth/login');  
    }

    public function supprimerDuPanier($id)
    {
        $uneCompetence = Competence::find($id);
        $emailRecruteur = Auth::user()->email;
        $unRecruteur = Recruteur::where('courriel', $emailRecruteur)->first();

            $panierTalent = PanierTalent::where('idRecruteur', '=', $unRecruteur->id)->where('idCompetence', '=', $uneCompetence->id)->first();
            $panierTalent->delete();

        return redirect()->route('panier.afficher')->with('message','Compétence enlevée de votre liste');
    }

    public function imprimerPanier()
    {
        $toutesLesCompetences = Competence::all();
        $toutesLesRealisations = Realisation::all();
        $emailRecruteur = Auth::user()->email;
        $unRecruteur = Recruteur::where('courriel', $emailRecruteur)->first();
        $toutLePanier = PanierTalent::where('idRecruteur', '=', $unRecruteur->id)
                                    ->join('competence', 'paniertalent.idCompetence', '=' , 'Competence.id')
                                    ->get();


        $pdf = PDF::loadView('panierPDF' , ["toutLePanier"=>$toutLePanier]);
        $pdf->download('panier.pdf');
    }

    public function emailPanier()
    {

    }
}

