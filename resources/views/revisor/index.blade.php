<x-main>
    <div class="container-fluid p-5 bg-gradient bg-warning shadow mb-5">
        <div class="row">
           
            <div class="col-12 text-dark m-3">
                @if(session()->has('message'))
                <div class="alert alert-success">{{session('message')}}
                </div>
             @endif
                <h1 >
                    {{ $announcement_to_check ? 'Ecco l\'annuncio da revisionare:' : 'Non ci sono annunci da revisionare' }}
                </h1>
            </div>
        </div>
        
    </div>
    
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-12">

                 @if ($announcement_to_check)
                    <h2 class="neonText2 mb-3">{{$announcement_to_check->title}}</h2>
             <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="https://picsum.photos/1200/700" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="https://picsum.photos/1200/701" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="https://picsum.photos/1200/699" class="d-block w-100" alt="...">
                </div>
            </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    
        <div class="col-md-4 mt-5 ps-5 col-12">
                    <div class="card-body">
                        {{-- <h5 class="card-title mt-3">{{$announcement->title}}</h5> --}}
                        <p class="card-text mt-5">{{$announcement_to_check->body}}</p>
                        <p class="card-text">Prezzo: €{{$announcement_to_check->price}}</p>
                        
                        <a href="{{route('categoryShow',['category'=>$announcement_to_check->category])}}" class=" my-3 btn btn-warning">Categoria: {{$announcement_to_check->category->name}}</a>
                        <p class="card-footer">Pubblicato il: {{$announcement_to_check->created_at->format('d/m/y')}}  <br>Autore: {{$announcement_to_check->user->name}}</p>
                        <span><form  class="d-inline" action="{{route('revisor.accept_announcement', ['announcement'=>$announcement_to_check])}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-success shadow d-inline" type="submit"
                            >Accetta</button>
                            </form></span>
                            <p class="d-inline"><form class="d-inline" action="{{route('revisor.reject_announcement', ['announcement'=>$announcement_to_check])}}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-danger shadow d-inline" type="submit">Rifiuta</button>
                            </form></p>
                      </div>
                      
                </div>
            </div>
            @if ($strazio)
           
            <div class="col-12 col-md-2">
                 <div>
                    <h6>
                        Hai appena revisionato questo annuncio, vuoi annullare?
                    </h6>{{$strazio->title}}</div>
                <form action="{{route('revisor.cancel_announcement', ['announcement'=>$strazio])}}" method="POST">
                @csrf
                @method('PATCH')
                <button class="btn btn-warning shadow" type="submit">annulla</button>
                </form>
            </div>       
   
    @endif
        </div>
       
        </div>
        @else
        <div class="spazio">
        </div>
        @endif
</x-main>
