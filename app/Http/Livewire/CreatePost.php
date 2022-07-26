<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class CreatePost extends Component
{

    public $open = false;

    public $title, $content;

    protected $rules = [
        'title' => 'required|max:10',
        'content' => 'required|min:20'
    ];

    public function updated($propertyName){ // metodo que se activa cada vez qe se modifica una propiedad declarada
        $this->validateOnly($propertyName);
    }

    public function save()
    {

        $this->validate();

        Post::create([
            'title' => $this->title,
            'content' => $this->content
        ]);

        $this->reset(['open', 'title', 'content']); // resetea las varibles indicadas

        $this->emitTo('show-posts', 'actualizar'); // el metodo emitTo permite renderizar solo un componente en especifico
        $this->emit('alert', 'El post se creó satisfactoriamente'); // el método emit Emite un evento llamado 'actualizar'


    }

    public function render()
    {
        return view('livewire.create-post');
    }
}
