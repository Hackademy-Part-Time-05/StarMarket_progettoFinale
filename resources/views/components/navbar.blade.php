<nav class="navbar navbar-expand-lg  bg-dark navbar-dark">
    <div class="container-fluid p-0 mx-4">
        <a class="navbar-brand bounce-top" href="{{ route('welcome') }}"><img class="logo-dim"
                src="{{ asset('media/logo.png') }}" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('welcome') }}">Home</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="categoriesDropdown" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Categorie
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
                        @foreach ($categories as $category)
                            <li><a class="dropdown-item"
                                    href="{{ route('categoryShow', compact('category')) }}">{{ $category->name }}</a>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>
                        @endforeach


                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('announcement.index') }}">Annunci</a>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Accedi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Registrati</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <div class="d-flex justify-content-center">

                                        <button type="submit" class="w-50 btn btn-danger">Esci</button>
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="btn btn-warning mb-lg-0 mb-2 me-2" href="{{ route('announcement.create') }}">Inserisci
                            Annuncio
                          </a>
                    </li>
                    @if (Auth::user()->is_revisor)
                        <li class="nav-item">
                            <a class="btn btn-outline-secondary me-2 mb-lg-0 mb-2 neonText text-white position-relative" aria-current="page"
                                href="{{ route('revisor.index') }}">
                                Zona Maestro Jedi
                                <span
                                    class="position-absolute top-0 star-100 translate-middle badge rounded-pill bg-light text-dark ">
                                    {{ App\Models\Announcement::toBeRevisionedCount()}}
                                    <span class="visually-hidden">Unread messages</span>
                                </span>
                              </a>
                        </li>
                    @endif
                @endguest
                <form action="{{route('announcements.search')}}" method="GET" class="d-flex">
                    <input class="form-control me-2 " name="searched" type="search" placeholder="Che la ricerca sia con te"
                        aria-label="Search">
                    <button class="btn btn-warning" type="submit">Ricerca</button>
                </form>
        </div>
    </div>
</nav>
