<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ItemCardComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    // Carry $item from home.blade.php to item-card-component.blde.php
    public $item;

    public function __construct($item)
    {
        $this->item = $item;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.item-card-component');
    }
}
