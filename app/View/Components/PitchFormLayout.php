<?php

namespace App\View\Components;

use App\Models\Pitch;
use App\Models\PitchForm;
use Illuminate\View\Component;

class PitchFormLayout extends Component
{
    public Pitch $pitch;
    public $updateMode;
    public $pitchForm;
    public $currentStep;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Pitch $pitch, $updateMode = false, $pitchForm = null, $currentStep = 1)
    {
        $this->pitch = $pitch;
        $this->updateMode = $updateMode;
        $this->pitchForm = $pitchForm;
        if ($pitchForm == null) {
            $this->pitchForm = new PitchForm();
        }
        $this->currentStep = $currentStep;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.pitch-form-layout');
    }
}
