<div class="col-6">
    <x-success/>
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
        <select wire:model.defer="category" id="category" class="form-control">
            <option value="">
                Scegli categoria
            </option>
            @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </div>


    <div>
        <button class="btn btn-primary" type="submit">invia</button>
    </div>
   </form>
</div>
