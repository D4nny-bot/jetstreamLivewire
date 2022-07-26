<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class CreatePost extends Component
{

    public $open = false;

    public $title, $content;

    public function save()
    {
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
