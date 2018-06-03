<nav id="navbar" class="navbar navbar-expand-md navbar-light sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{-- TODO: Replace with WEBM --}}
            {{-- Note: aspect ratio for the image is 86 : 37 --}}
            <img src="{{ asset('images/logo.png') }}" id="logo" width="180" height="77" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li><a href="#app" class="nav-link active">Sākums</a></li>
                <li><a href="#greatWorks" class="nav-link">Labie Darbi</a></li>
                <li><a href="#events" class="nav-link">Pasākumi</a></li>
                <li><a href="#getInvolved" class="nav-link">Iesaisties!</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                {{-- <button class="btn btn-lg btn-primary">Iesūti</button> --}}

                <!-- Authentication Links -->
                @guest
                    {{-- <li><a class="nav-link" href="{{ route('login') }}">{{ __('Ieiet') }}</a></li> --}}
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
