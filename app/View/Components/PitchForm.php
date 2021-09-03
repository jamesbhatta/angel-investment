<?php

namespace App\View\Components;

use App\Models\Pitch;
use Illuminate\View\Component;

class PitchForm extends Component
{
    public $pitch;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Pitch $pitch)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.pitch-form');
    }
}
