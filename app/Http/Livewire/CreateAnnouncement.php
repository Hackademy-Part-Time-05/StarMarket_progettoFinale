<?php

namespace App\Http\Livewire;

use App\Models\Announcement;
use Livewire\Component;

class CreateAnnouncement extends Component
{
    public $title;
    public $body;
    public $price;

    protected $rules=[
        'title'=>'required|max:50|min:4',
        'body'=>'required|max:500|min:10',
        'price'=>'required|numeric',
    ];
    protected $messages=[
        'required'=>'testa di cazzo scrivi :attribute',
        'max'=>'scemo,troppo lungo :attribute',
        'min'=>'we braccino corto :attribute',
        'numeric'=>'cazzo sei scemo :attribute',
    ];
    public function render()
    {
        return view('livewire.create-announcement');
    }
    public function submit()
    {
        
        Announcement::create([
            'title' => $this->title,
            'body' => $this->body,
            'price'=> $this->price,
        ]);
        session()->flash('success','Annuncio creato correttamente');
        $this->cleanForm();
    }
    public function cleanForm(){
        $this->title='';
        $this->body='';
        $this->price='';
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
