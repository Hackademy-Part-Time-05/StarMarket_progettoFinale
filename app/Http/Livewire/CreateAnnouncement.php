<?php

namespace App\Http\Livewire;

use App\Models\Announcement;
use Livewire\Component;

class CreateAnnouncement extends Component
{
    public $title;
    public $body;
    public $price;

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
        session()->flash('success','Articolo creato correttamente');
    }
}
