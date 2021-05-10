@extends('templateClient')
@section('titre')
   ÉTUDIANT
@endsection
@section('contenu')
    <h1>Modification de l'étudiant</h1>  
    <form method="POST" action="/etudiant/enregistrer">  
        {{ csrf_field() }}  
        <input name="id" type="hidden" placeholder="id" value="{{ $unEtudiant->id }}" />
        <strong>Prénom:</strong><input name="prenom" type="text" value="{{ $unEtudiant->prenom }}" />
        <br /> <br />
        <strong>Nom:</strong> <input name="nom" type="text" value="{{ $unEtudiant->nom }}" >
        <br /> <br />
        <strong>Adresse:</strong> <input name="adresse" type="text" value="{{ $unEtudiant->adresse }}" >
        <br /> <br />
        <strong>Ville:</strong> <input name="ville" type="text" value="{{ $unEtudiant->ville }}" >
        <br /> <br />
        <strong>Code Postal:</strong> <input name="codePostal" type="text" value="{{ $unEtudiant->codePostal }}" >
        <br /> <br />
        <strong>Telephone:</strong> <input name="telephone" type="text" value="{{ $unEtudiant->telephone }}" >
        <br /> <br />
        <strong>Courriel:</strong> <input name="courriel" type="text" value="{{ $unEtudiant->courriel }}" >
        <br /> <br />
        <strong>Biographie:</strong> <input name="biographie" type="text" value="{{ $unEtudiant->biographie }}" >
        <br /> <br />
        <input name="idEtudiant" type="hidden"  value="1" />
        <button type="submit">Enregistrer</button>  

    </form>  
@endsection