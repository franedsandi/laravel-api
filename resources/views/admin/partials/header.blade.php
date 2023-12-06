<header class="bg-dark">
    <nav class="navbar navbar-dark h-100">
        <div class="container-fluid">
            <div class="links">
                <a href="{{ route('home')}}" target="_blank" class="navbar-brand p-1">
                    <i class="fa-solid fa-circle-arrow-left"></i>
                    <span>Back to public site</span>
                </a>
            </div>
            {{-- logout  --}}
            <form action="{{route('logout')}}" class="d-flex" method="POST" role="search">
                @csrf
                <button type="submit" class="btn btn-outline-light" type="submit"><i class="fa-solid fa-right-from-bracket"></i></button>
            </form>

        </div>
      </nav>
</header>
