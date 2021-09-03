<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pitch;
use Illuminate\Http\Request;

class PitchController extends Controller
{
    public function index()
    {
        $pitches = Pitch::latest()->get();
        return view('pitch.admin.listing', compact('pitches'));
    }
}
