<x-main>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 col-12">
                <h1>{{$announcement->title}}</h1>
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

            <div class="col-md-6 mt-5 col-12">
                <div class="card-body">
                    {{-- <h5 class="card-title mt-3">{{$announcement->title}}</h5> --}}
                    <p class="card-text mt-4">{{$announcement->body}}</p>
                    <p class="card-text">Prezzo: €{{$announcement->price}}</p>
                    
                    <a href="{{route('categoryShow',['category'=>$announcement->category])}}" class=" mt-4 btn btn-warning">Categoria: {{$announcement->category->name}}</a>
                    <p class="card-footer">Pubblicato il: {{$announcement->created_at->format('d/m/y')}}  <br>Autore: {{$announcement->user->name}}</p>
                  </div>
            </div>

        </div>
        
        
    </div>
   
</x-main>