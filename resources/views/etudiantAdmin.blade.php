@extends('templateAdmin')
@section('titre')
   ETUDIANT
@endsection
@section('contenu')
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
<div style="height: 100px; width:100%;">
        <br>
        <h1 style="margin-left:5%">Gestion Étudiante</h1>

    <br>
    <table style="width:80%; margin-left:5%;">
        <tr>
            <th>Compétences</th>
            <th></th>
            <th><a title='Ajouter' class='btn btn-success' href="/ajout/competence">Ajouter une compétence</a></th>
        </tr>
    @foreach ($toutesLesCompetences as $uneCompetence)  
    <tr>
            <td style="width:50%"><a href="./competence/{{ $uneCompetence->id }}">{{$uneCompetence->nomCompetence}} - {{$uneCompetence->description}}</a></td>
            <td style="width:15%"><a title='Modifier' class='btn btn-success' href="./competence/modifier/{{$uneCompetence->id}}">Modifier</a></td>
            <td style="width:15%"><a title='Supprimer' class='btn btn-danger' href="./competence/supprimer/{{$uneCompetence->id}}">Supprimer</a></td>
    </tr>
    @endforeach
    </table>
    <br>
    <table style="width:80%; margin-left:5%;">
        <tr>
            <th>Réalisations</th>
            <th></th>
            <th><a title='Ajouter' class='btn btn-success' href="./ajout/realisation">Ajouter une réalisation</a></th>
        </tr>
    @foreach ($toutesLesRealisations as $uneRealisation)  
    <tr>
            <td style="width:50%"><a href="./realisation/{{ $uneRealisation->id }}">{{$uneRealisation->nomRealisation}} - {{$uneRealisation->description}}</a></td>
            <td style="width:15%"><a title='Modifier' class='btn btn-success' href="./realisation/modifier/{{$uneRealisation->id}}">Modifier</a></td>
            <td style="width:15%"><a title='Supprimer' class='btn btn-danger' href="./realisation/supprimer/{{$uneRealisation->id}}">Supprimer</a></td>
    </tr>
    @endforeach
    </table>
    <br>
    <table style="width:80%; margin-left:5%;">
        <tr>
            <th>Informations personnelles</th>
            <th></th>
        </tr>
    @foreach ($tousLesEtudiants as $unEtudiant)  
    <tr>
            <td style="width:50%"><a href="./etudiant/{{ $unEtudiant->id }}">{{$unEtudiant->prenom}} {{$unEtudiant->nom}}</a></td>
            <td style="width:50%"><a title='Modifier' class='btn btn-success' href="./modifier/etudiant/{{$unEtudiant->id}}">Modifier</a></td>
    </tr>
    @endforeach
    </table>
    </div>
@endsection