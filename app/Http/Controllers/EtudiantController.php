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

require_once __DIR__ .'/vendor/phpmailer/phpmailer/src/Exception.php';
require_once __DIR__ .'/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require_once __DIR__.'/vendor/phpmailer/phpmailer/src/SMTP.php';


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
            $mail->addAddress('portfolio.guillaume10@gmail.com', 'Pelletier Guigui');
            $mail->addReplyTo('portfolio.guillaume10@gmail.com', 'Pelletier Guigui');

            //Contenu du courriel
            $mail->IsHTML(true); $mail->Subject = "Send email using Gmail SMTP and PHPMailer";
            $mail->Body = $message;
            $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';
            $mail->send();
        } catch (Exception $e) {
            echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
        }

    }
}
