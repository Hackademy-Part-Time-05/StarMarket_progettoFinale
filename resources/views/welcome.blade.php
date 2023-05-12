<x-main>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Star Market</h1>
                <p class="h2 my-2 fw-bold">Ecco i nostri annunci</p>
                <div class="row">
                    @foreach ($announcements as $announcement)
                    <div class="col-12 col-md-6 col-lg-4 my-4">
                        <div class="card mx-auto" style="width: 18rem;">
                            <img src="https://picsum.photos/200" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">{{$announcement->title}}</h5>
                                <p class="card-text">{{$announcement->body}}</p>
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