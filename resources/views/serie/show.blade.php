@extends('layouts.app')

@section('content')
    <div class="show">
        <div class=" info info-titre">
            <div class="info-haut container">
                <img src="{{asset($serie->urlImage)}}">
                <div class="info-droit">
                    <div class="info-droit-haut">
                        <h1>{{$serie->nom}}</h1>
                        <h2>{{$serie->premiere}}.{{$serie->genre}}</h2>
                    </div>
                    <div class="info-droit-bas">
                        <h2>Note : {{$serie->note}} / 10</h2>
                        <h2 class="status">statut: {{$serie->statut}}</h2>
                    </div>
                </div>
            </div>
        </div>

        {{$serie->avis}}
        <div class="info-show">
            <div class="container">
                <div class="info-description">
                    <h2>Description</h2>
                    <p>{{$serie->resume()}}</p>
                </div>

                <div>
                <h2>Les épisodes</h2>
                    <div class="serie_statut">
                        <form action="{{route('serie.store')}}" method="POST">
                            @foreach($episodes as $episode)
                                <p>saison: {{$episode->saison}} épisode: {{$episode->numero}}: <b>{{$episode->nom}}</b>
                                    {!! csrf_field() !!}
                                    @if(Auth::user())
                                        <button type="submit" id="maBox" name="maBox" value="{{$episode->id}}">Vue</button>
                                    @endif
                            @endforeach
                        </form>
                    </div>
                </div>
            </div>
            @if(Auth::user())
                <form action="{{route('comment.store')}}" method="POST" class="container">
                    {!! csrf_field() !!}
                    <div>
                        <div class="text-center">
                            <h3>poster un commentaire</h3>
                        </div>
                        <label for="commentaire"><strong>Commentaire</strong></label>
                        <input type="text" class="classe" id="comment" placeholder="commentaire" name="commentaire" value="{{old('commentaire')}}">
                        <input type="number" class="classe" id="note" name="note" placeholder="Note" value="{{old('note')}}">
                        <button type="submit" name="serie" value="{{$serie->id}}">Soumettre votre commentaire</button>
                    </div>
                </form>
            @endif
            @if(Auth::user())
                @if(Auth::user()->administrateur)
                    <h2 class="les_com container">Les commentaires</h2>
                    @foreach($comments as $comment)

                        <form class="container" action="{{route('comment.update', $comment)}}" method="POST">
                            @csrf
                            @method('PUT')
                            @if(!$comment->validated)
                                <h1>Vous valider ?</h1>
                                <button type="submit" id="valide" name="test" value="0">Valider</button>
                                <button type="submit" id="refus" name="test" value="1">Refuser</button>
                            @endif

                            <h1 class="utilisateur_post">Un utilisateur a posté</h1>
                            <p class="message">
                            {{$comment->newContent()}}
                            </p>

                        </form>
                    @endforeach
                @else
                    <div class="container">
                    @foreach($comments as $comment)
                        @if($comment->validated)
                            {{$comment->newContent()}}
                        @else
                    </div>
                            @if(Auth::user()->id == $comment->user_id)
                                {{$comment->newContent()}} : <b>En attente de validation</b>
                            @endif
                        @endif
                    @endforeach

                @endif
            @endif


        </div>
    </div>
@endsection