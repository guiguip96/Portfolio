<!DOCTYPE html>
<html lang="en">
<body>
    <header>
    @foreach ($toutLesEtudiants as $Guillaume)
        <h1>Portfolio en ligne de {{$Guillaume->prenom}} {{$Guillaume->nom}}</h1>
    @endforeach
    </header>
    <h2>Liste des compétences retenues</h2>
        <div>
        @foreach ($toutLePanier as $unItem)  
            <h3>{{$unItem->nomCompetence}}<h3>
            <p>{{$unItem->description}}</p>
        @endforeach
        </div>    
</body>
</html>
