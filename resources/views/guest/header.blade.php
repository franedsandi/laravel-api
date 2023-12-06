<header class="bg-dark">
    <nav class="container d-flex align-items-center justify-content-between navbar-dark h-100">
            <a href="{{ route('home')}}" target="_blank" class="navbar-brand p-1">
                <i class="fa-solid fa-circle-arrow-left"></i>
                <h2>Welcome to the public site</h2>
            </a>
        <ul class="navbar-nav ml-auto ">
            <div class="d-flex gap-3">
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ url('profile') }}">{{__('Profile')}}</a>
                        <a class="dropdown-item" href="{{ route('admin.home') }}">
                            Go to admin site
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
            
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </div>
      </nav>
</header>
