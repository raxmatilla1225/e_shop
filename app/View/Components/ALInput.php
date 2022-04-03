<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ALInput extends Component
{

    /**
     * The alert type.
     *
     * @var string
     */
    public string $type;



    /**
     * The alert type.
     *
     * @var string
     */
    public string $name;


    /**
     * The alert type.
     *
     * @var string
     */
    public string $label;


    /**
     * The alert type.
     *
     * @var string
     */
    public string $placeholder;


    /**
     * The alert type.
     *
     * @var string
     */
    public string $id;


    /**
     * The alert type.
     *
     * @var string
     */
    public string $class;




    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type, $name, $placeholder = false, $id = false, $label = false, $class = false)
    {

        $this->type = $type;
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->id = $id;
        $this->label = $label;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.a-l-input');
    }
}
