<x-main>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h2 class="h2 my-2 fw-bold neonText2">Ecco i nostri annunci</h2>
                <div class="row">
                    @forelse ($announcements as $announcement)
                    <div class="col-12 col-md-6 col-lg-4 my-4">
                        <div class="card mx-auto shadow-mrk"  data-aos="zoom-in-down" data-aos-duration="800" style="width: 18rem;">
                            <img src="{{!$announcement->images()->get()->isEmpty() ? Storage::url($announcement->images()->first()->path) : 'https://picsum.photos/200'}}" class="card-img-top img-fluid " alt="...">
                            <div class="card-body rounded bg-body-tertiary ">
                              <h5 class="card-title title-dimension overflow-hidden">{{$announcement->title}}</h5>
                              {{-- <p class="card-text">{{$anouncement->body}}</p> --}}
                              <p class="card-text">Prezzo: €{{$announcement->price}}</p>
                              <a href="{{route('announcement.show',compact('announcement'))}}" class="btn w-100 btn-warning">Visualizza</a>
                              <a href="{{route('categoryShow',['category'=>$announcement->category])}}" class="btn w-100 my-2 btn-warning">Categoria: {{$announcement->category->name}}</a>
                              <p class="card-footer bg-white">Pubblicato il: {{$announcement->created_at->format('d/m/y')}} <br>Autore: {{$announcement->user->name}}</p>

                            </div>
                          </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <div class="alert alert-warning py-3 shadow">
                            <p class="lead">Non ci sono annunci per questa ricerca. Prova a passare al lato oscuro</p>
                        </div>
                    </div>
                    @endforelse
                    {{$announcements->appends(Request::except('page'))->links()}}
                </div>
            </div>
        </div>
    </div>
</x-main>