
<div class="header">
    <div class="menu">
        <a href="{{url('/') }}">Accueil</a>
        <a href="{{url('/#tendance')}}">Tendances</a>
        <a href="{{url('/#catalogue')}}">Catalogue</a>
        @if (Auth::user())
        <a href="{{route('user.show',Auth::user()->id)}}">Mon profil</a>
        @else
        <a href="{{route('login')}}">Mon Profil</a>
        @endif
    </div>
    <!-- Authentication Links -->

    <nav>
        <ul>
            @guest
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            @else
                @if (Auth::user())
                @endif
                <li><a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        Logout
                    </a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            @endguest
        </ul>
    </nav>
</div>