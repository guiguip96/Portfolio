@extends('templateClient')
@section('titre')
   COMPÉTENCE
@endsection
@section('contenu')
    <h1>Modification d’une compétence</h1>  
    <form method="POST" action="/competence/enregistrer">  
        {{ csrf_field() }}  
        <input name="id" type="hidden" placeholder="id" value="{{ $uneCompetence->id }}" />
        <strong>Nom de la compétence:</strong><input name="nomCompetence" type="text" placeholder="Nom de la compétence" value="{{ $uneCompetence->nomCompetence }}" />
        <br /> <br />
        <strong>Description:</strong> <input name="description" type="text" value="{{ $uneCompetence->description }}" >
        <br /> <br />
        <input name="idEtudiant" type="hidden"  value="1" />
        <button type="submit">Enregistrer</button>  

        <script type="text/javascript">
            $( "#datepicker" ).datepicker();
        </script>
    </form>  
@endsection