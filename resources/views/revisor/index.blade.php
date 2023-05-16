<x-main>
    <div class="container-fluid p-5 bg-gradient bg-success shadow mb-5">
        <div class="row">
            @if(session()->has('message'))
                <div class="alert alert-success">{{session('message')}}
                </div>
                
        @endif
            <div class="col-12 tex-light mb-5 p-5">
                <h1 class="display-2">
                    {{ $announcement_to_check ? 'Ecco l\'annuncio da revisionare' : 'Non ci sono annunci da revisionare' }}
                </h1>
            </div>
            @if ($strazio)
                
            <div>{{$strazio->title}}</div>
            @endif
        </div>
    </div>
    @if ($announcement_to_check)
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div id="showCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://picsum.photos/1200/200" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="https://picsum.photos/1200/199" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="https://picsum.photos/1200/201" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button"
                            data-bs-target="#showCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button"
                            data-bs-target="#showCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <h5 class="card-title">Titolo: {{$announcement_to_check->title}}</h5>
                    <p class="card-text">
                        Descrizione: {{$announcement_to_check->body}}
                    </p>
                    <p class="card-footer">
                        Pubblicato il: {{$announcement_to_check->created_at->format('d/m/Y')}}
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6">
                    <form action="{{route('revisor.accept_announcement', ['announcement'=>$announcement_to_check])}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button class="btn btn-success shadow" type="submit"
                    >Accetta</button>
                    </form>
                </div>
                <div class="col-12 col-md-6">
                    <form action="{{route('revisor.reject_announcement', ['announcement'=>$announcement_to_check])}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button class="btn btn-success shadow" type="submit">Rifiuta</button>
                    </form>
                </div>
            </div>
            
        </div>
        </div>
        @else
        <div class="spazio">
        </div>
        @endif
</x-main>
