@extends('layouts.app')

@section('content')
<section class="profil">

    <div class="avatar">

        <div class="img-avatar">
            <img src="{{asset($user->avatar)}}">
            <a class="modif-img" href="#">modifier l’image</a>
        </div>

        <div class="nom-prenom">
            {{$user->name}} <br>
            {{$user->email}} <br>
        </div>

        <div class="modif-pw">
            <a class="m-pw" href="#">Modifier votre mot de passe</a>
        </div>

    </div>

    <div class="ma-liste">

@foreach($serieVue as $episode)
    <a href="{{route('serie.show',$episode->id)}}">{{$episode->nom}}</a><br>
@endforeach
@if(Auth::user())
    @foreach($user->comments as $comment)
        @if($comment->validated)
            {{$comment->newContent()}}
        @else
                    {{$comment->newContent()}} <b> En Attente </b>
        @endif
        <br>
    @endforeach
    @if(Auth::user()->administrateur)
        @foreach($users as $utilisateur)
            @foreach($utilisateur->comments as $comment)
                @if(!$comment->validated)
                    <div>
                        {{$utilisateur->nom}}: {{$comment->content}}
                        <form action="{{route('user.update', $comment)}}" method="POST">
                            @csrf
                            @method('PUT')
                            {{$comment->newContent()}}
                                <button type="submit" id="valide" name="test" value="0">Valider</button>
                                <button type="submit" id="refus" name="test" value="1">Refuser</button>
                        </form>
                    </div>
                @endif
            @endforeach
        @endforeach
    @endif
@endif
        <h1>Ma liste</h1>

        <div class="liste-film">
            <div class="film1">
                @foreach($serieVue as $episode)
                    <div class="description-ensemble">
                        <img class="img-film-liste" src="{{asset($episode->urlImage)}}">
                        <div class="description">
                            <a href="{{route('serie.show',$episode->id)}}">{{$episode->nom}}</a>
                            <a class="modif-ep" href="#">modifier les épisodes</a>
                            <a class="suppr-liste" href="#">supprimer de la liste</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>


            <div class="pop-up">
                <div class="pu-titre">
                    <h1 class="title">Arcane</h1>
                    <i class="fas fa-times"></i>
                </div>

                <div class="liste-ep">
                    <ul>
                        @foreach($user->seen as $episode)
                            <p>saison: {{$episode->saison}} épisode: {{$episode->numero}}: <b></b><button type="button">Vue</button></p>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>



<script>
    let modifEp = document.querySelector(".modif-ep");
    let popUp = document.querySelector(".pop-up");
    let close = document.querySelector(".fa-times");

    modifEp.onclick = function(){
        popUp.classList.toggle('active');
    }

    close.onclick = function(){
        popUp.classList.remove('active');
    }
</script>

@endsection