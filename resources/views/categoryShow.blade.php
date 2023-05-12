<x-main>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Presto.it</h1>
                <p class="h2 my-2 fw-bold">Ecco i nostri annunci</p>
                <div class="row">
                    @forelse ( $category->announcements as $announcement)
                    <div class="col-12 col-md-4 my-4">
                        <div class="card" style="width: 18rem;">
                            <img src="https://picsum.photos/200" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">{{$announcement->title}}</h5>
                              <p class="card-text">{{$announcement->body}}</p>
                              <p class="card-text">Prezzo: {{$announcement->price}}€</p>
                              <a href="#" class="btn btn-primary">Visualizza</a>
                              <a href="#" class="btn btn-primary">Categoria: {{$announcement->category->name}}</a>
                              <p class="card-footer">Publicato il :{{$announcement->created_at->format('d/m/y')}} <br>
                               Autore: {{$announcement->user->name ?? ''}}</p>
                            </div>
                          </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <p class="h1">Non ci sono annunci per questa categoria</p>
                        <p class= "h2">Pubblicane uno: <a href="{{route ('announcement.create')}}"class="btn-success btn shadow"> Nuovo Annuncio</a></p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-main>