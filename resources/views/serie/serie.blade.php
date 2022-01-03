@extends('layouts.app')

@section('content')
    <div class="fond_img">
        <div class="accueil">

            <div class="titre">
                <img src="{{asset("img/logod.png")}}" class="logo" alt="logo">
                <h1>WATCH'D</h1>
                <div class="sous-titre">
                    <h2>Suit l'actualité de</h2>&nbsp;<h2 class="couleur">tes</h2>&nbsp;<h2>Séries Préférées</h2>
                </div>
            </div>

            <div class="top-film">


                <div class="film">
                    <h2>Les mieux notées</h2>
                    @foreach($treeSeries as $serie)
                        <div class="film1">
                            <div class="img_accueil">
                                <img class="img-film" src="{{asset($serie->urlImage)}}">
                            </div>

                            <div class="contenu">

                                <h3 class="titre_film">{{$serie->nom}}</h3>
                                <p class="details">{{$serie->premiere}}</p>
                                <h3 class="notes">Notes</h3>
                                <p class="note">{{$serie->note}}</p>
                            </div>

                        </div>
                    @endforeach
                </div>

            </div>

        </div>
        <div class="degrade"></div>
    </div>
    <div id="tendance" class="tendances-actuelles">
        <div class="container">

            <h1 class="tendances_titre"> Les tendances actuelles</h1>
            <div class="tendances">
                @foreach($cinqSeries as $serie)
                    <div class="tendances_5">
                        <div class="img_tendances">
                            <img class="img-film-tendances" src="{{asset($serie->urlImage)}}">
                        </div>

                        <div class="contenu">

                            <h3 class="titre_film">{{$serie->nom}}</h3>
                            <p class="details">{{$serie->premiere}}</p>
                            <h3 class="notes">Notes</h3>
                            <p class="note">{{$serie->note}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div id="catalogue" class="liste-globale">
        <div class="container">
            <h1 class="tendances_titre">Notre liste</h1>
            <div class="liste-film">
                @foreach($series as $serie)
                    <a href="{{route('serie.show',$serie->id)}}">
                        <div class="element-film">
                            <h3 class="titre_film">{{$serie->nom}}</h3>
                            <div class="img_liste">

                                    <img class="img-film-liste" src="{{asset($serie->urlImage)}}">
                            </div>

                            <p class="note">note: {{$serie->note}}</p>
                            <p class="details"><p class="details">langue : {{$serie->langue}}</p>

                            <p class="details">{{$serie->genre}}</p>
                            <p class="details">{{$serie->avis}}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        <div class="degrade-liste"></div>
    </div>
@endsection