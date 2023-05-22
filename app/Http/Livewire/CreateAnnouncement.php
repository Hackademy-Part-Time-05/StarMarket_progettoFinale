<?php

namespace App\Http\Livewire;

use App\Models\Announcement;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateAnnouncement extends Component
{

    use WithFileUploads;

    public $title;
    public $body;
    public $price;
    public $category;
    public $images = [];
    public $temporary_images;
    public $image;
    public $form_id;
    public $announcement;

    protected $rules=[
        'title'=>'required|max:50|min:4',
        'body'=>'required|max:500|min:10',
        'category'=>'required',
        'price'=>'required|numeric',
        'temporary_images.*' => 'image|max:1024',
        'images.*' => 'image|max:1024',
        

    ];
    protected $messages=[
        'required'=>'è richiesto un :attribute',
        'max'=>'troppo lungo ',
        'min'=>'troppo corto ',
        'numeric'=>'occhio inserisci un numero',
        'temporary_images.required' => 'L\'immagine è richiesta',
        'temporary_images.*.image' => 'I file devono essere immagini',
        'images.image' => 'L\'immagine dev\'essere un\'immagine',
        'temporary_images.*.max' => 'L\'immagine dev\'essere massimo di 1mb',
        'images.max' => 'L\'immagine dev\'essere massimo di 1mb',


    ];
    public function render()
    {
        return view('livewire.create-announcement');
    }
    public function submit()
    {
        $this->validate();
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
