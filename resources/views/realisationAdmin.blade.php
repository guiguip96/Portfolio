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
    <div style="background-image: url('../images/banniereAdmin.jpg'); background-repeat: no-repeat; background-size:cover; height: 300px">
        <br><br>
        <h1>Gestion des réalisations</h1>
    </div>
    <h1>Création d’une nouvelle réalisation</h1>  
    <form method="POST" action="/realisation/enregistrer">  
        {{ csrf_field() }}  
        <strong>Nom de la réalisation:</strong><input name="nomRealisation" type="text" placeholder="Nom de la réalisation" value="{{ old('nomRealisation') }}" />
        <br /> <br />
        <strong>Description:</strong> <input name="description" type="text">
        <br /> <br />
        <strong>Compétence associée :</strong><select name="idCompetence">
            @foreach($toutesLesCompetences as $uneCompetence)
                <option value="{{ $uneCompetence->id }}">{{ $uneCompetence->nomCompetence }}</option>
            @endforeach                 
        </select>
        <input name="idEtudiant" type="hidden"  value="1" />
        <br /> <br />
        <button type="submit">Enregistrer</button>  
    </form>  
@endsection