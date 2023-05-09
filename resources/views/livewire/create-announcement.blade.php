<div class="col-6">
    <x-success/>
   <form wire:submit.prevent="submit">
    <div>
        <label for="title">Titolo</label>
        <input type="text" class="form-control" wire:model.lazy="title">
    </div>
    <div>
        <label for="body">Descrizione</label>
        <input type="text" class="form-control" wire:model.lazy="body">
    </div>
    <div>
        <label for="price">Prezzo</label>
        <input type="text" class="form-control" wire:model.lazy="price">
    </div>
    <div>
        <button class="btn btn-primary" type="submit">invia</button>
    </div>
   </form>
</div>
