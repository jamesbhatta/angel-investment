<?php

namespace App\Http\Controllers;

use App\Models\Pitch;
use Illuminate\Http\Request;

class PitchActionController extends Controller
{
    public function approve(Pitch $pitch)
    {
        $pitch->update(['is_verified' => true]); 
        
        return redirect()->back();
    }
}
