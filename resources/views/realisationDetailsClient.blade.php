@extends('templateClient')
@section('titre')
   RÉALISATION
@endsection
@section('contenu')
    <h1>Détail de la compétence</h1>
    <div>{{ $uneRealisation->id }}</div>
    <div>{{ $uneRealisation->nomRealisation }}</div>
@endsection
