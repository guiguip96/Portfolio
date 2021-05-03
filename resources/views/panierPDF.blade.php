<!DOCTYPE html>
<html lang="en">
<body>
    <h2>Liste des compétences</h1>
    @foreach ($toutLePanier as $unItem)  
        <a  >{{$unItem->nomCompetence}}</a>
        <a >{{$unItem->description}}</a>
        <a  class="btn btn-danger"  href="/panier/supprimer/{{ $unItem->id }}">Supprimer</a>
    @endforeach
</body>
</html>
