<nav class="navbar navbar-expand-lg mb-5 bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('welcome')}}">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('welcome')}}">Home</a>
          </li>
          
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="categoriesDropdown"  href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Categorie
            </a>
            <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
              @foreach ( $categories as $category)
              <li><a class="dropdown-item" href="{{route('categoryShow', compact('category'))}}">{{$category->name}}</a></li>
            
              <li><hr class="dropdown-divider"></li>
              @endforeach
             
             
            </ul>
          </li>
          <li class="nav-item" >
            <a class="nav-link" href="{{route('announcement.index')}}">Annunci</a>
        </li>
          @guest
          <li class="nav-item">
              <a class="nav-link" href="{{route('login')}}">accedi</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="{{route('register')}}">registrati</a>
          </li>
          @else 

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{auth()->user()->name}}
            </a>
            <ul class="dropdown-menu">
              <li>
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <div class="d-flex justify-content-center">

                      <button type="submit" class="w-50 btn btn-danger">esci</button>
                    </div>
                </form>
              </li>
            </ul>
        </li>
        <li>
            <a class="btn btn-primary" href="{{route('announcement.create')}}">Inserisci Annuncio</a>
        </li>

    


        @endguest
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>