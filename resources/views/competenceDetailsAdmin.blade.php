@extends('templateAdmin')
@section('titre')
   COMPÉTENCE
@endsection
@section('contenu')
    <h1>Détail de la compétence</h1>
    <div>{{ $uneCompetence->id }}</div>
    <div>{{ $uneCompetence->nomCompetence }}</div>
@endsection
