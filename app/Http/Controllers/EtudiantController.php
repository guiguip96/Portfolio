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
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class EtudiantController extends Controller
{
    public function modifierEtudiant($id)
    {
        $unEtudiant = Etudiant::find($id);
        return view('etudiantModifier')->with('unEtudiant', $unEtudiant); 
    }

    /**
     * @author: Guillaume Pelletier
     * @link: (url ou git ou rien)
     * @subject: L'ajout d'une nouvelle compétence
     * @name: enregistrerCompetence
     * @param In: Les champs du formulaire remplis
     * @param Out: Une nouvelle compétence
     */
    public function enregistrerEtudiant(Request $request)
    {
        $request->validate
        ([
            'prenom' => ['required', 'min:3', 'max:50' ],
            'nom' => ['required', 'min:3', 'max:50' ],
            'adresse' => ['required', 'min:1', 'max:50' ],
            'codePostal' => ['required', 'min:3', 'max:50' ],
            'ville' => ['required', 'min:3', 'max:50' ],
            'telephone' => ['required', 'min:3', 'max:50' ],
            'courriel' => ['required', 'min:3', 'max:50' ],
            'biographie' => ['required', 'min:3', 'max:2500' ],
        ]);
        $unEtudiant = Etudiant::firstOrNew(['id'=>$request->input('id')]);
        $unEtudiant->prenom = $request->input('prenom');
        $unEtudiant->nom = $request->input('nom');
        $unEtudiant->adresse = $request->input('adresse');
        $unEtudiant->codePostal = $request->input('codePostal');
        $unEtudiant->ville = $request->input('ville');
        $unEtudiant->telephone = $request->input('telephone');
        $unEtudiant->courriel = $request->input('courriel');
        $unEtudiant->biographie = $request->input('biographie');
        $unEtudiant->save();
        return redirect()->route('etudiant.afficher')->with('message','Étudiant modifié avec succès');
    }

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
        return abort(403, trans('Accès Refusé'));
    }

        /**
     * @author: Guillaume Pelletier
     * @link: /
     * @subject: Afficher la zone d'administration
     * @name: afficherAdmin
     * @param In: -
     * @param Out: La view pour afficher l'administration
     */
    public function envoyerCourriel(Request $request)
    {
        $email = $request->email;
        $nom = $request->nom;
        $prenom = $request->prenom;
        $message = $request->message;

        $mail = new PHPMailer(true);
        try{
            $mail->isSMTP(); $mail->Host = 'smtp.gmail.com'; $mail->SMTPAuth = true;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
            $mail->Username = 'portfolio.guillaume10@gmail.com';
            $mail->Password = 'Patate123';

            //Envoyé par
            $mail->setFrom($email, $nom . $prenom);
            $mail->addAddress('portfolio.guillaume10@gmail.com', 'Pelletier Guillaume');
            $mail->addReplyTo('portfolio.guillaume10@gmail.com', 'Pelletier Guillaume');

            //Contenu du courriel
            $mail->CharSet = 'UTF-8';
            $mail->IsHTML(true); $mail->Subject = "Message de la part de $email";
            $mail->Body = $message;
            $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';
            $mail->send();



            //Envoyé par
            $mail->setFrom('portfolio.guillaume10@gmail.com', 'Portfolio - Guillaume Pelletier');
            $mail->addAddress($email, $prenom . " " . $nom);
            $mail->addReplyTo('portfolio.guillaume10@gmail.com', 'Pelletier Guillaume');
            
            //Contenu du courriel
            $mail->CharSet = 'UTF-8';
            $mail->IsHTML(true); $mail->Subject = "Message envoyé!";
            $mail->Body = "Votre message à bien été reçu! Je vous reviens dès que possible!";
            $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';
            $mail->send();
        } catch (Exception $e) {
            echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
        }
        
        $Guillaume = Etudiant::where('id', '=', '1')->get();
        $toutesLesCompetences = Competence::all();
        $toutesLesRealisations = Realisation::all();

        return view('index')->with('Guillaume', $Guillaume)
                            ->with('toutesLesCompetences', $toutesLesCompetences)
                            ->with('toutesLesRealisations', $toutesLesRealisations);
    }
}
