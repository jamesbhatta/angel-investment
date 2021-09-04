<?php

namespace App\Http\Controllers;

use App\Models\Pitch;
use Illuminate\Http\Request;

class PitchActionController extends Controller
{
    public function approve(Pitch $pitch)
    {
        $pitch->update(['is_verified' => true]);

        $this->flash()->success('Pitch approved.');
        return redirect()->back();
    }

    public function unapprove(Pitch $pitch)
    {
        $pitch->update(['is_verified' => false]);

        $this->flash()->success('Pitch unapproved.');
        return redirect()->back();
    }
}
