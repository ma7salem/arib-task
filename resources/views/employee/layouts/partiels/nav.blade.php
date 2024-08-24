
<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="#">Arib Task</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                </li>
                <form id="logout-form" action="{{ route('emp_logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{route('emp_login')}}">Login</a>
                </li>
                @endauth
            </ul>

        </div>
    </div>
</nav>