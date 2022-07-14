<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowPosts extends Component
{
    public $title;

    /*public function mount($title){
        //$this->titulo = $title;
    }
    */
    public function render()    // se encarga de renderizar el contenido de la vista de livewire/show-posts
    {
        return view('livewire.show-posts');
            //->layout('layouts.base'); PARA USAR COMO PLANTILLA LA PLANTILLA base
    }
}
