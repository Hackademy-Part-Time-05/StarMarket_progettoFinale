<?php

namespace App\Http\Livewire;

use App\Models\Announcement;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateAnnouncement extends Component
{
    public $title;
    public $body;
    public $price;
    public $category;

    protected $rules=[
        'title'=>'required|max:50|min:4',
        'body'=>'required|max:500|min:10',
        'category'=>'required',
        'price'=>'required|numeric',

    ];
    protected $messages=[
        'required'=>'è richiesto un nome :attribute',
        'max'=>'troppo lungo ',
        'min'=>'troppo corto ',
        'numeric'=>'occhio inserisci un numero',
    ];
    public function render()
    {
        return view('livewire.create-announcement');
    }
    public function submit()
    {
        $category = Category::find($this->category);
        $announcement = $category->announcements()->create([
            'title' => $this->title,
            'body' => $this->body,
           
            'price'=> $this->price,
        ]);
        Auth::user()->announcements()->save($announcement);
        
        session()->flash('success','Annuncio creato correttamente');
        $this->cleanForm();
    }
    public function cleanForm(){
        $this->title='';
        $this->body='';
        $this->category='';
        $this->price='';
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
