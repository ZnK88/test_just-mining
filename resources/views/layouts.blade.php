<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script
    src="https://code.jquery.com/jquery-3.5.1.js"
    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('assets/css/navbar.css')}}">
    @yield('header')
    <title>Document</title>
</head>

<body>
    <div class="navbar">
        
        <h1>Just-Mining</h1>
        <div class="panel-login-register">
            @if (Auth::user())
            <div>
                <p class="user-info">Bienvenue {{Auth::user()->name}}</p>
            </div>
            <div>
                <a class="btn-logout" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                @else
                <a href="{{ route('login') }}">
                    <div class="btn-login">Login</div>
                </a>
                <a href="{{ route('register') }}">
                    <div class="btn-register">Register</div>
                </a>
                @endif
            </div>
        </div>
    </div>
    <div>
        @yield('content')
    </div>

</body>

</html>
