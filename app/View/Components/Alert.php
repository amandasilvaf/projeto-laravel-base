<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{

    public $tipo;
    public $titulo;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($tipo, $titulo)
    {
        $this->tipo = $tipo;
        $this->titulo = $titulo;
 
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
