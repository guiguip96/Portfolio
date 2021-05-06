@extends('templateClient')
@section('titre')
   RÉALISATION
@endsection
@section('contenu')
    <h1>Modification d’une réalisation</h1>  
    <form method="POST" action="/realisation/enregistrer">  
        {{ csrf_field() }}  
        <input name="id" type="hidden" placeholder="id" value="{{ $uneRealisation->id }}" />
        <strong>Nom de la réalisation:</strong><input name="nomRealisation" type="text" placeholder="Nom de la réalisation" value="{{ $uneRealisation->nomRealisation }}" />
        <br /> <br />
        <strong>Description:</strong> <input name="description" type="text" value="{{ $uneRealisation->description }}" >
        <br /> <br />
        <input name="idEtudiant" type="hidden"  value="1" />
        <button type="submit">Enregistrer</button>  
    </form>  
@endsection