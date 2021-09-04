<?php

namespace App\View\Components;

use App\Models\Pitch;
use Illuminate\View\Component;

class PitchAdminActionBar extends Component
{
    public Pitch $pitch;
    
    public function __construct(Pitch $pitch)
    {
        $this->pitch = $pitch;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.pitch-admin-action-bar');
    }
}
