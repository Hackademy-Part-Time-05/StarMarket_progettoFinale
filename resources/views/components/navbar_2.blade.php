<nav class="navbar navbar-expand-lg bg-dark navbar-dark border-bottom p-0 sticky-top" id="mainNavbar">
    <div class="container-fluid p-0 mx-4">
        <a class="navbar-brand bounce-top " href="{{ route('welcome') }}"><img class="logo-dim"
                src="{{ asset('media/logo2.png') }}" alt=""></a>
        <button class="navbar-toggler text-presto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('welcome') }}"><i class="fa-solid fa-house me-2"></i>Home</a>
                </li>

                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle " id="categoriesDropdown" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{__('ui.categories')}}
                    </a>
                    <ul class="dropdown-menu rounded-0 m-0 bg-dark" aria-labelledby="categoriesDropdown">
                        @foreach ($categories as $category)
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                            <li class="nav-item "><a class="nav-link p-0"
                                    href="{{ route('categoryShow', compact('category')) }}">{{ $category->name }}</a>
                            </li>

                            
                        @endforeach


                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('announcement.index') }}">{{__('ui.announcements')}}</a>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{__('ui.login')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{__('ui.register')}}</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu bg-warning">
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="fa-solid fa-person-walking-luggage text-black bg-danger">Bye bye
                                            </button>
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="btn btn-warning mb-lg-0 mb-2 me-2 margin" href="{{ route('announcement.create') }}">{{__('ui.insertAnnouncements')}}
                          </a>
                    </li>
                    @if (Auth::user()->is_revisor)
                        <li class="nav-item">
                            <a class="btn btn-outline-secondary me-2 mb-lg-0 mb-2 neonText text-white position-relative" aria-current="page"
                                href="{{ route('revisor.index') }}">
                                {{__('ui.jediMasterZone')}}
                               
                                @if (App\Models\Announcement::toBeRevisionedCount()>0)
                                <span   class="position-absolute top-0 star-100 translate-middle badge rounded-pill bg-warning text-dark ">
                                    {{ App\Models\Announcement::toBeRevisionedCount()}}
                                    <span class="visually-hidden">Unread messages</span>
                                </span>
                                @endif
                                
                              </a>
                        </li>
                    @endif
                @endguest
                
                
                 <form action="{{route('announcements.search')}}" method="GET">
                    <li class="box nav-item mt-3 bg-warning">
                        <input type="search" name="searched" placeholder="{{__('ui.maysearch')}}">
                        <button type="submit" class="btn btn-warning p-0"><i class="fa-solid fa-magnifying-glass text-black"></i></button>
                    </li>
                </form>
                {{-- <form action="{{route('announcements.search')}}" method="GET" class="d-flex">
                    <input class="form-control me-2 p-0 margin2" name="searched" type="search" placeholder="{{__('ui.maysearch')}}"
                        aria-label="Search">
                    <button class="btn btn-warning margin2" type="submit">{{__('ui.search')}}</button>
                </form> --}}

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="categoriesDropdown" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{__('ui.changeLanguage')}}
                    </a>
                    <ul class="dropdown-menu rounded-0 bg-dark m-0" aria-labelledby="categoriesDropdown">
                        <li class="nav-link nav-item ">
                            <x-_locale lang="it"/> Italiano
                        </li>
                        <li class="nav-link nav-item">
                            <x-_locale lang="es"/> Español
                        </li>
                        <li class="nav-link nav-item">
                            <x-_locale lang="en"/> English
                        </li>
                    </ul>
                </li>
        </div>
    </div>
</nav>
