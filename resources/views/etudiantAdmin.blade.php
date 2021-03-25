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
<div style="height: 100px">
        <br>
        <h1>Gestion Étudiante</h1>
    </div>
    <br>
    <table>
        <tr>
            <th>Compétences</th>
            <th></th>
            <th></th>
        </tr>
    @foreach ($toutesLesCompetences as $uneCompetence)  
    <tr>
            <td><a href="./competence/{{ $uneCompetence->id }}">{{$uneCompetence->nomCompetence}} - {{$uneCompetence->description}}</a></td>
            <td><a title='Modifier' class='btn btn-success' href="./competence/modifier/{{$uneCompetence->id}}">Modifier</a></td>
            <td><a title='Supprimer' class='btn btn-danger' href="./competence/supprimer/{{$uneCompetence->id}}">Supprimer</a></td>
    </tr>
    @endforeach
    </table>
    <br>
    <table>
        <tr>
            <th>Réalisations</th>
            <th></th>
            <th></th>
        </tr>
    @foreach ($toutesLesRealisations as $uneRealisation)  
    <tr>
            <td><a href="./realisation/{{ $uneRealisation->id }}">{{$uneRealisation->nomRealisation}} - {{$uneRealisation->description}}</a></td>
            <td><a title='Modifier' class='btn btn-success' href="./realisation/modifier/{{$uneRealisation->id}}">Modifier</a></td>
            <td><a title='Supprimer' class='btn btn-danger' href="./realisation/supprimer/{{$uneRealisation->id}}">Supprimer</a></td>
    </tr>
    @endforeach
    </table>
    <br>
    <table>
        <tr>
            <th>Informations personnelles</th>
            <th></th>
            <th></th>
        </tr>
    @foreach ($tousLesEtudiants as $unEtudiant)  
    <tr>
            <td><a href="./etudiant/{{ $unEtudiant->id }}">{{$unEtudiant->prenom}} {{$unEtudiant->nom}}</a></td>
            <td><a title='Modifier' class='btn btn-success' href="./modifier/etudiant/{{$unEtudiant->id}}">Modifier</a></td>
            <td><a title='Supprimer' class='btn btn-danger' href="./supprimer/etudiant/{{$unEtudiant->id}}">Supprimer</a></td>
    </tr>
    @endforeach
    </table>
@endsection