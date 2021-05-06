@extends('templateAdmin')
@section('titre')
   RÉALISATION
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
    <h1>Création d’une nouvelle réalisation</h1>  
    <form method="POST" action="/realisation/enregistrer">  
        {{ csrf_field() }}  
        <strong>Nom de la réalisation:</strong><input name="nomRealisation" type="text" placeholder="Nom de la réalisation"/>
        <br /> <br />
        <strong>Description:</strong> <input name="description" type="text">
        <br /> <br />
        <input name="idEtudiant" type="hidden"  value="1" />
        <br /> <br />
        <button type="submit">Enregistrer</button>  
    </form>  
@endsection