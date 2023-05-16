<x-main>
    {{-- <audio controls muted autoplay>
      
        <source src="{{asset('media/audio/StarWars-battuto.mp3')}}" type="audio/mpeg">
    
      </audio> --}}
    
    @if(session()->has('access.denied'))
                <div class="alert alert-danger">{{session('access.denied')}}
                </div>
        @endif
    
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="https://picsum.photos/1000/600" class="d-block w-100" alt="...">
                <div class="position-absolute top-50 start-50 text-center translate-middle">
                    <h1 class="display-1">Star Market</h1>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="https://picsum.photos/1000/600" class="d-block w-100" alt="...">
                <div class="position-absolute top-50 start-50 text-center translate-middle">
                    <h1 class="display-1">Star Market</h1>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="https://picsum.photos/1000/600" class="d-block w-100" alt="...">
                <div class="position-absolute top-50 start-50 text-center translate-middle">
                    <h1 class="display-1">Star Market</h1>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
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
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="h2 my-5 fw-bold">Ecco i nostri annunci</p>
                <div class="row">
                    @foreach ($announcements as $announcement)
                    <div class="col-12 col-md-6 col-lg-4 my-4">
                        <div class="card mx-auto shadow-mrk" style="width: 18rem;">
                            <img src="https://picsum.photos/200" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">{{$announcement->title}}</h5>
                                {{-- <p class="card-text">{{$announcement->body}}</p> --}}
                                <p class="card-text">Prezzo: €{{$announcement->price}}</p>
                                <a href="{{route('announcement.show',compact('announcement'))}}" class="btn w-100 btn-warning">Visualizza</a>
                                <a href="{{route('categoryShow',['category'=>$announcement->category])}}" class="btn w-100 my-2 btn-warning">Categoria: {{$announcement->category->name}}</a>
                                <p class="card-footer bg-white">Pubblicato il: {{$announcement->created_at->format('d/m/y')}}</p>
                            </div>
                          </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-main>