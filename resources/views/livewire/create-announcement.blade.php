<div class="container overlay mt-5 card">
    <div class="row mx-5">
        <div class="col-12 col-lg-6">
            <h2 class="mt-5 neonText2">{{__('ui.insertYourAnnouncement')}}</h2>
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
                <label for="title">{{__('ui.title')}}</label>
                <input type="text" class="form-control @error('title')is-invalid @enderror" wire:model.lazy="title">
                @error('title') <span class="small text-danger">{{$message}}</span>@enderror
            </div>
            <div>
                <label for="body">{{__('ui.description')}}</label>
                <input type="text" class="form-control @error('body')is-invalid @enderror" wire:model.lazy="body">
                @error('body') <span class="small text-danger">{{$message}}</span>@enderror
            </div>
            <div>
                <label for="price">{{__('ui.price')}}</label>
                <input type="text" class="form-control @error('price')is-invalid @enderror" wire:model.lazy="price" >
                @error('price') <span class="small text-danger">{{$message}}</span>@enderror
            </div>
        
            <div>
                <label for="category"></label>
                <select wire:model.defer="category" id="category" name="category" class="form-control">
                    <option value="">
                        {{__('ui.categoryChoose')}}
                    </option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                       
                    </select>
                    @error('category') <span class="small text-danger">{{$message}}</span>@enderror
            </div>
        
            <div class="my-3">
                <input wire:model="temporary_images" type="file" name="images" multiple class="form-control shadow @error('temporary_images.*')is-invalid @enderror" placeholder="Img"/> @error('temporary_images') <span class="small text-danger">{{$message}}</span>@enderror
            </div>
            @if (!empty($images))
            {{-- @dd(@$image) --}}
            <div class="row">
                <div class="col-12">
                    <p>photo preview</p>
                    <div class="row border border-4 border-info rounded py-4">
                        @foreach ($images as $key => $image)
                        
                            <div class="col my-3">
                                <div class="img-preview mx-auto rounded" style="background-image: url({{ $image->temporaryUrl() }})"></div>
                                <button class="btn btn-danger d-block text-center-mt-2 mx-auto" wire:click="removeImage({{ $key }})" type="button">Cancella</button>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
                
            @endif
            <div class="mt-3">
                <button class="btn btn-warning" type="submit">{{__('ui.publish')}}</button>
            </div>
           </form>
        </div>
    </div>
    

        <div class="spazio"></div>      
        
</div>
<div class="soldier"></div>