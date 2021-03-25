@extends('templateAdmin')
@section('titre')
   COMPÉTENCE
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
    <div style="background-image: url('../images/banniereAdmin.jpg'); background-repeat: no-repeat; background-size:cover; height: 300px">
        <br><br>
        <h1>Gestion des compétences</h1>
    </div>
    <h1>Création d’une nouvelle compétence</h1>  
    <form method="POST" action="/competence/enregistrer">  
        {{ csrf_field() }}  
        <strong>Nom de la compétence:</strong><input name="nomCompetence" type="text" placeholder="Nom de la compétence" value="{{ old('nomCompetence') }}" />
        <br /> <br />
        <strong>Description:</strong> <input name="description" type="text">
        <br /> <br />
        <input name="idEtudiant" type="hidden"  value="1" />
        <br /> <br />
        <button type="submit">Enregistrer</button>  
    </form>  
@endsection