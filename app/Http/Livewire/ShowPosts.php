<?php

namespace App\Http\Livewire;

use Livewire\Component;
// importamos el modelo
use App\Models\Post;

class ShowPosts extends Component
{
    public $title;

    /*public function mount($title){
        //$this->titulo = $title;
    }
    
    public $name;

    public function mount($name){
        $this->name = $name;
    }
    */

    /*
    EL METODO RENDER SE EJECUTA CADA VEZ QUE SE USA UNA VARIABLE O FUNCION
    QUE SE USA EN LA VISTA DE ESE MODO ACTUALIZA CADA CAMBIO QUE SE 
    REALIZA EN TIEMPO REAL
    */

    public $search;
    public $sort = 'id';
    public $direction = 'desc';

    public function render()    // se encarga de renderizar el contenido de la vista de livewire/show-posts
    {
        //$posts = Post::all();
        // like indica que permite caracteres especiales
        // la sigiente instruccion hace una busqueda y obtiene las filas que coinciden tanto en 
        // el titulo y el contenido
        $posts = Post::where('title', 'like', '%' . $this->search . '%') // % INDICA QUE PUEDE HABER UN TEXTO ANTES Y UNO DESPUES
                        ->orWhere('content', 'like', '%' . $this->search . '%')
                        ->orderBy($this->sort, $this->direction)
                        ->get();

        return view('livewire.show-posts', compact('posts'));
            //->layout('layouts.base'); PARA USAR COMO PLANTILLA LA PLANTILLA base
    
    }
    public function order($sort)
    {
        if($this->sort == $sort)
        {
            if ($this->direction == 'desc'){
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }

    }
}