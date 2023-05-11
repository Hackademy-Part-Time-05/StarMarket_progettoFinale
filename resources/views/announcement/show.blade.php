<x-main>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>{{$announcement->title}}</h1>
                <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
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
        <div class="row">
            <div class="col-6">
                <div class="card-body">
                    <h5 class="card-title">{{$announcement->title}}</h5>
                    <p class="card-text">{{$announcement->body}}</p>
                    <p class="card-text">{{$announcement->price}}</p>
                    <a href="{{route('announcement.show',compact('announcement'))}}" class="btn btn-primary">Visualizza</a>
                    <a href="{{route('categoryShow',['category'=>$announcement->category])}}" class="btn btn-primary">Categoria:{{$announcement->category->name}}</a>
                    <p class="card-footer">Publicato il :{{$announcement->created_at->format('d/m/y')}}</p>
                  </div>
            </div>
        </div>
    </div>
   
</x-main>