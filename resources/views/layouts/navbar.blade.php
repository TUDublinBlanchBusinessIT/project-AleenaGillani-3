<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ url('/') }}">Movie Collection</a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link" href="{{ route('movies.index') }}">Movies</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('genres.index') }}">Genres</a></li>
        </ul>
        @auth
            <span class="navbar-text mr-3">Welcome, {{ Auth::user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-outline-danger btn-sm">Logout</button>
            </form>
        @else
            <a class="btn btn-outline-primary btn-sm mr-2" href="{{ route('login') }}">Login</a>
            <a class="btn btn-outline-success btn-sm" href="{{ route('register') }}">Register</a>
        @endauth
        @guest
        <a class="btn btn-outline-primary btn-sm mr-2" href="{{ route('login') }}">Login</a>
        <a class="btn btn-outline-success btn-sm" href="{{ route('register') }}">Register</a>
        @endguest

    </div>
</nav>
