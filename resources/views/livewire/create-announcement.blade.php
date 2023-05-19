<div class="container">
    <div class="row">
        <div class="col-12 col-lg-6">
            <h2 class="mt-5 neonText2">Inserisci il tuo annuncio</h2>
            <x-success/>
             {{--  --}}
             @if(session()->has('success'))
      @else
        <div class="spazio_2"></div>      
        @endif
      @if(session()->has('success'))
      <audio autoplay>
      
        <source src="{{asset('media/audio/StarWars-battuto.mp3')}}" type="audio/mpeg">
    
      </audio>
      
        @endif
           <form wire:submit.prevent="submit">
            <div>
                <label for="title">Titolo</label>
                <input type="text" class="form-control @error('title')is-invalid @enderror" wire:model.lazy="title">
                @error('title') <span class="small text-danger">{{$message}}</span>@enderror
            </div>
            <div>
                <label for="body">Descrizione</label>
                <input type="text" class="form-control @error('body')is-invalid @enderror" wire:model.lazy="body">
                @error('body') <span class="small text-danger">{{$message}}</span>@enderror
            </div>
            <div>
                <label for="price">Prezzo</label>
                <input type="text" class="form-control @error('price')is-invalid @enderror" wire:model.lazy="price" >
                @error('price') <span class="small text-danger">{{$message}}</span>@enderror
            </div>
        
            <div>
                <label for="category"></label>
                <select wire:model.defer="category" id="category" name="category" class="form-control">
                    <option value="">
                        Scegli categoria
                    </option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                       
                    </select>
                    @error('category') <span class="small text-danger">{{$message}}</span>@enderror
            </div>
        
        
            <div class="mt-3">
                <button class="btn btn-warning" type="submit">Pubblica</button>
            </div>
           </form>
        </div>
    </div>
   
        <div class="spazio"></div>      
        
</div>
