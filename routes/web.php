<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Barryvdh\DomPDF\Facade as PDF;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

//Routes de bases pour les pages principales (Landing page, Administration)
Route::get('/',
        [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home',
        [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/etudiantAdmin', 
        [App\Http\Controllers\EtudiantController::class, 'afficherAdmin'])->name('etudiant.afficher');
Route::post('/envoiCourriel', 
        [App\Http\Controllers\EtudiantController::class, 'envoyerCourriel'])->name('etudiant.envoi');

//Gestion des compétences
Route::get('/competence/{id}', 
        [App\Http\Controllers\CompetenceController::class, 'afficherDetailsCompetence'])->name('competence.afficherDetails'); 
Route::get('/ajout/competence', 
        [App\Http\Controllers\CompetenceController::class, 'ajouterCompetence'])->name('competence.ajouter');   
Route::post('/competence/enregistrer', 
        [App\Http\Controllers\CompetenceController::class, 'enregistrerCompetence'])->name('competence.enregistrer');
Route::get('/competence/modifier/{id}', 
        [App\Http\Controllers\CompetenceController::class, 'modifierCompetence'])->name('competence.modifier'); 
Route::get('/competence/supprimer/{id}', 
        [App\Http\Controllers\CompetenceController::class, 'supprimerCompetence'])->name('competence.supprimer');

//Gestion des réalisations
Route::get('/realisation/{id}', 
        [App\Http\Controllers\RealisationController::class, 'afficherDetailsRealisation'])->name('realisation.afficherDetails');  
Route::get('/ajout/realisation', 
        [App\Http\Controllers\RealisationController::class, 'ajouterRealisation'])->name('realisation.ajouter');   
Route::post('/realisation/enregistrer', 
        [App\Http\Controllers\RealisationController::class, 'enregistrerRealisation'])->name('realisation.enregistrer');
Route::get('/realisation/modifier/{id}', 
        [App\Http\Controllers\RealisationController::class, 'modifierRealisation'])->name('realisation.modifier'); 
Route::get('/realisation/supprimer/{id}', 
        [App\Http\Controllers\RealisationController::class, 'supprimerRealisation'])->name('realisation.supprimer');

//Gestion des recruteurs et étudiante
Route::get('/profil/{id}', 
        [App\Http\Controllers\RecruteurController::class, 'afficherProfil'])->name('recruteur.afficherProfil'); 
Route::post('/recruteur/enregistrer', 
        [App\Http\Controllers\RecruteurController::class, 'enregistrerRecruteur'])->name('recruteur.enregistrer');
Route::post('/etudiant/enregistrer', 
        [App\Http\Controllers\EtudiantController::class, 'enregistrerEtudiant'])->name('etudiant.enregistrer');
Route::get('/etudiant/modifier/{id}', 
        [App\Http\Controllers\EtudiantController::class, 'modifierEtudiant'])->name('etudiant.modifier'); 

//Gestion du panier
Route::get('/panier',
        [App\Http\Controllers\PanierController::class, 'afficherPanier'])->name('panier.afficher');
Route::get('/ajoutpanier/{id}',
        [App\Http\Controllers\PanierController::class, 'ajouterAuPanier'])->name('panier.ajouter');
Route::get('/panier/supprimer/{id}',
        [App\Http\Controllers\PanierController::class, 'supprimerDuPanier'])->name('panier.ajouter');
Route::get('/impression/pdf', 
        [App\Http\Controllers\PanierController::class, 'imprimerPanier'])->name('panier.imprimer');