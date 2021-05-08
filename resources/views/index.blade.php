<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Portfolio</title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="/css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">
                <span class="d-block d-lg-none">Guillaume Pelletier</span>
                <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="assets/img/profile.jpg" alt="" /></span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">À PROPOS</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#experience">EXPÉRIENCES</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#skills">COMPÉTENCES</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#interests">RÉALISATIONS</a></li>
                    <br><br>
                    @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Connexion') }}</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Inscription') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if (Auth::user()->type=='recruteur')
                                        <a class="dropdown-item" href="./profil/{{ Auth::user()->id }}">Profil</a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Déconnexion') }}
                                    </a>
                                    
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @if(Auth::user()->type=='recruteur')
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="/panier">PANIER</a></li>
                            @endif
                            @if(Auth::user()->type=='etudiant')
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ url('/etudiantAdmin') }}">ADMIN</a></li>
                            @else
                            @endif
                        @endguest
                </ul>
            </div>
        </nav>
        <!-- Page Content-->
        <div class="container-fluid p-0">
            <!-- About-->
            <section class="resume-section" id="about">

                <div class="resume-section-content">
                    @if (session('message'))  
                        <div class="alert alert-info">  
                            <strong>  
                                {{ session('message') }}  
                            </strong>  
                        </div>  
                    @endif
                    <h1 class="mb-0">
                    @foreach($Guillaume as $leGuillaume)
                        {{$leGuillaume->prenom}}
                    @endforeach
                        <span class="text-primary">
                    @foreach($Guillaume as $leGuillaume)
                        {{$leGuillaume->nom}}
                    @endforeach</span>
                    </h1>
                    <div class="subheading mb-5">
                    @foreach($Guillaume as $leGuillaume)
                        {{$leGuillaume->telephone}}
                    @endforeach · 
                    @foreach($Guillaume as $leGuillaume)
                        {{$leGuillaume->ville}}
                    @endforeach, QC ·
                        <a href="mailto:guillaumep_96@hotmail.fr">
                    @foreach($Guillaume as $leGuillaume)
                        {{$leGuillaume->courriel}}
                    @endforeach</a>
                    </div>
                    @guest
                        <p class="lead mb-5">Bienvenue sur mon portfolio interactif!
                        <br>Afin de profiter des multiples fonctionnalités disponibles, veuillez créer un compte.
                        <br><br>Entre autre, vous pourrez:
                        <br>- Enregistrer les éléments qui vous attirent
                        <br>- Vous les envoyer par courriel
                        <br>- Les sauvegarder en format PDF
                        </p>
                    @else
                    <p class="lead mb-5">Bienvenue sur mon portfolio interactif!</p>
                    @endguest
 
                    <p >
                    @foreach($Guillaume as $leGuillaume)
                        {{$leGuillaume->biographie}}
                    @endforeach</p>
                    <br>
                    <div class="social-icons">
                        <a class="social-icon" href="#"><i class="fab fa-github"></i></a>
                        <a class="social-icon" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="social-icon" href="#"><i class="fab fa-facebook-f"></i></a>
                    </div>

                </div>
            </section>
            <hr class="m-0" />
            <!-- Experience-->
            <section class="resume-section" id="experience">
                <div class="resume-section-content">
                    <h2 class="mb-5">Expériences de travail</h2>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">Expériences de travail en informatique</h3>
                            <div class="subheading mb-3">Wazoom Studio</div>
                            <p>Modifier et mettre à jour de nombreux sites web</p>
                        </div>
                        <div class="flex-shrink-0"><span class="text-primary">Mai 2020 - Février 2021</span></div>
                    </div>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <div class="subheading mb-3">Cégep de Rivière-du-Loup</div>
                            <p>Stage lors de mon DEC. Majoritairement en support technique</p>
                        </div>
                        <div class="flex-shrink-0"><span class="text-primary">Mai 2019 - Août 2019</span></div>
                    </div>
                    <h2 class="mb-5">Parcours scolaire</h2>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">Études supérieures</h3>
                            <div class="subheading mb-3">Techniques de l'informatique - École du Web</div>
                            <p>Cégep de Rivière-du-Loup</p>
                        </div>
                        <div class="flex-shrink-0"><span class="text-primary">2018 - 2021</span></div>
                    </div>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <div class="subheading mb-3">Technique de Graphisme (2 ans)</div>
                            <p>Cégep de Rivière-du-Loup</p>
                        </div>
                        <div class="flex-shrink-0"><span class="text-primary">2013 - 2015</span></div>
                    </div>
                </div>
            </section>
            <hr class="m-0" />
            <!-- Skills-->
            <section class="resume-section" id="skills">
                <div class="resume-section-content">
                    <h2 class="mb-5">Compétences</h2>
                    <!--<div class="subheading mb-3">Outils maîtrisés</div>
                    <ul class="list-inline dev-icons">
                        <li class="list-inline-item"><i class="fab fa-node-js"></i></li>
                        <li class="list-inline-item"><i class="fab fa-wordpress"></i></li>
                        <li class="list-inline-item"><i class="fab fa-npm"></i></li>
                        <li class="list-inline-item"><i class="fab fa-html5"></i></li>
                        <li class="list-inline-item"><i class="fab fa-css3-alt"></i></li>
                        <li class="list-inline-item"><i class="fab fa-js-square"></i></li>
                        <li class="list-inline-item"><i class="fab fa-sass"></i></li>
                    </ul>
                    <br>
                    -->
                    <div class="subheading mb-3">Mise de côté</div>
                    <div class="mb-0">Mon portfolio comporte un module vous permettant de sauvegarder les éléments qui vous marquent, testez-le en vous connectant!</div>
                        <br>
                        <!--Carousel Wrapper-->
                        <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">
                            
                            <!--Indicators-->
                                <ol class="carousel-indicators">
                                    <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
                                    <li data-target="#multi-item-example" data-slide-to="1"></li>
                                    <li data-target="#multi-item-example" data-slide-to="2"></li>
                                </ol>
                            <!--/.Indicators-->
                            <!--Slides-->
                            <div class="carousel-inner" role="listbox">
                                <!--First slide-->
                                <div class="carousel-item active">
                                    <div class="row">
                                    @foreach($toutesLesCompetences as $uneCompetence)
                                        <div class="col-md-4 clearfix d-none d-md-block">
                                            <div class="card mb-2">
                                                <div class="card-body">
                                                    <h4 class="card-title">{{$uneCompetence->nomCompetence}}</h4>
                                                    <p class="card-text">{{$uneCompetence->description}}</p>
                                                    @guest
                                                    @else
                                                        @if(Auth::user()->type=='recruteur')
                                                        <a class="btn btn-primary" href="./ajoutpanier/{{$uneCompetence->id}}">Ajouter à ma liste</a>
                                                        @endif
                                                    @endguest
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    </div>
                                </div>
                            </div>
                        <!--/.Slides-->
                    </div>
                    <!--/.Carousel Wrapper-->
                </div>
            </section>
            <hr class="m-0" />
            <!-- Interests-->
            <section class="resume-section" id="interests">
                <div class="resume-section-content">
                    <h2 class="mb-5">Réalisations</h2>
                    <p>Lors de ma technique en informatique à Rivière-du-Loup, j'ai réalisé de nombreux projets.</p>
                    <p class="mb-0">À même titre que les compétences, ceux-ci peuvent être ajoutés à votre liste personnalisée afin de faciliter leur consultation ultérieure!</p>
                    <br>
                    <!--Carousel Wrapper-->
                        <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">
                            
                            <!--Indicators-->
                                <ol class="carousel-indicators">
                                    <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
                                    <li data-target="#multi-item-example" data-slide-to="1"></li>
                                    <li data-target="#multi-item-example" data-slide-to="2"></li>
                                </ol>
                            <!--/.Indicators-->
                            <!--Slides-->
                            <div class="carousel-inner" role="listbox">
                                <!--First slide-->
                                <div class="carousel-item active">
                                    <div class="row">
                                    @foreach($toutesLesRealisations as $uneRealisation)
                                        <div class="col-md-4 clearfix d-none d-md-block">
                                            <div class="card mb-2">
                                                <div class="card-body">
                                                    <h4 class="card-title">{{$uneRealisation->nomRealisation}}</h4>
                                                    <p class="card-text">{{$uneRealisation->description}}</p>
                                                    @guest
                                                    @else
                                                        @if(Auth::user()->type=='recruteur')
                                                        <a class="btn btn-primary" href="./realisation/{{$uneRealisation->id}}">Plus de détails</a>
                                                        @endif
                                                    @endguest
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    </div>
                                </div>
                            </div>
                        <!--/.Slides-->
                    </div>
                    <!--/.Carousel Wrapper-->
                </div>
            </section>
            <hr class="m-0" />
            <!-- Contact-->
            <section class="resume-section" id="experience">
                <div class="container">
                <h2 class="mb-5">Contactez-moi!</h2>
                <form method="POST" action="/envoiCourriel">
                    {{ csrf_field() }} 
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Prénom</label>
                                <input name="prenom" type="text" class="form-control" id="inputEmail4" placeholder="Entrez votre prénom...">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Nom</label>
                                <input name="nom" type="text" class="form-control" id="inputPassword4" placeholder="Entrez votre nom..." >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Adresse courriel</label>
                            <input name="email" type="text" class="form-control" id="inputAddress" placeholder="Entrez votre email..." >
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Votre message</label>
                            <textarea name="message" type="text" class="form-control" id="inputAddress" placeholder="Entrez votre message..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                    </form>
                </div>
            </section>
            <hr class="m-0" />
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Core theme JS-->
        <script src="../js/scripts.js"></script>
    </body>
</html>
