<x-main>
    <div class="container mb-5">
        <div class="row">
            <div class="col-12 mt-5">
                <h2 class="h2 my-5 fw-bold text-center neonText2">Ecco i nostri annunci nella categoria:  {{$category->name}}</h2>
                <div class="row">
                    @forelse  ( $category->announcements as $announcement)
                   
                    <div class="col-12 col-md-6 col-lg-4 my-4">
                        <div class="card shadow-mrk mx-auto" style="width: 18rem;">
                            <img src="https://picsum.photos/200" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">{{$announcement->title}}</h5>
                              {{-- <p class="card-text">{{$announcement->body}}</p> --}}
                              <p class="card-text">Prezzo: {{$announcement->price}}€</p>
                              <a href="#" class="btn btn-warning mb-2 w-100">Visualizza</a>
                              
                              <p class="card-footer bg-white">Pubblicato il: {{$announcement->created_at->format('d/m/y')}} <br>
                               Autore: {{$announcement->user->name ?? ''}}</p>
                            </div>
                          </div>
                    </div>
                    @empty
                    <div class="col-12 text-center">
                        <p class="h4">Non ci sono annunci per questa categoria</p>
                        <p class= "h4">Pubblicane uno: <a href="{{route ('announcement.create')}}"class="btn-warning btn shadow"> Nuovo Annuncio</a></p>
                    </div>
                    <div class="spazio"></div>
                    <div class="spazio"></div>
                    
                    <div style="height: 150px"></div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-main>