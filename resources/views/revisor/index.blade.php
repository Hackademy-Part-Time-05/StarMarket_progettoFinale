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
    
    <div class="container my-5 overlay card">
        <div class="row">
            
            {{-- carousel e card annuncio da revisionare--}}
            @if ($announcement_to_check)
            <h2 class="neonText2 mb-3 display-5">{{$announcement_to_check->title}}</h2>
            <div class="col-md-6 col-lg-6 col-12">
                <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                    @if ($announcement_to_check->images)
                    <div class="carousel-inner">
                        @foreach ($announcement_to_check->images as $image )
                            <div class="carousel-item @if($loop->first)active  @endif ">
                                <img src="{{Storage::url($image->path)}}" alt="" class="img-fluid p-3 rounded" alt="">
                            </div>
                        @endforeach
                    </div>
                        
                    @else
                    
                    
                    {{-- @endif --}}
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://picsum.photos/1200/700" class="d-block img-fluid w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/1200/701" class="d-block img-fluid w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/1200/699" class="d-block img-fluid w-100" alt="...">
                        </div>
                        @endif
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
            </div>
            <div class="col-md-6 col-lg-3 col-12">
                <div class="card-body">
                    {{-- <h5 class="card-title mt-3">{{$announcement->title}}</h5> --}}
                    <p class="card-text mt-4"><strong>{{$announcement_to_check->body}}</strong></p>
                    <p class="card-text">Prezzo: €{{$announcement_to_check->price}}</p>
                    
                    <a href="{{route('categoryShow',['category'=>$announcement_to_check->category])}}" class=" my-3 btn btn-warning">Categoria: {{$announcement_to_check->category->name}}</a>
                    <p class="card-footer">Pubblicato il: {{$announcement_to_check->created_at->format('d/m/y')}}  <br>Autore: {{$announcement_to_check->user->name}}</p>
                    <span><form  class="d-inline" action="{{route('revisor.accept_announcement', ['announcement'=>$announcement_to_check],  ['stato'=>'promosso'])}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button class="btn btn-success shadow d-inline" type="submit">Promuovi</button>
                        </form></span>
                        <p class="d-inline"><form class="d-inline" action="{{route('revisor.reject_announcement', ['announcement'=>$announcement_to_check], ['stato'=>'rifiutato'])}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-danger shadow d-inline" type="submit">Respingi</button>
                        </form></p>
                </div>
                  
            </div>
            @endif


            {{-- annuncio già revisionato --}}
            @if ($announcement)
            <div class="col-12 col-md-4 col-lg-3 mt-5 card h-100 pb-2 shadow-mrk border border-danger border-5">
                <div>
                    <p class="fw-bold">
                        Hai appena<span class="h4"> {{$stato}} </span> questo annuncio: <strong class="text-dark"><p class="h4">{{$announcement->title}}</p></strong>
                    </p>
                    <h6> Vuoi annullare?</h6>
                </div>
                    <form action="{{route('revisor.cancel_announcement', ['announcement'=>$announcement])}}" method="POST">
                    @csrf
                    @method('PATCH')
                        <span class="fw-bold">Usa la forza</span>
                        <button class="btn btn-dark shadow py-0 neonText2 recall" type="submit">Richiama</button>
                    </form>
            </div>       
            @endif
        </div>
    </div>
    @if ($announcement_to_check)
    @else
    <div class="spazio mt-5">
    </div>
    @endif    
       

        

</x-main>
