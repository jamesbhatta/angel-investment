<?php

namespace App\Http\Controllers;

use App\Models\Investment;
use App\Models\Pitch;
use App\Models\User;
use Illuminate\Http\Request;

class MyInvestorsController extends Controller
{
    public function __invoke()
    {
        $myPitchesId = Pitch::where('user_id', auth()->user()->id)->pluck('id');

        $investments = Investment::with('investor')->whereIn('pitch_id', $myPitchesId)
            ->latest()->paginate();

        return view('my-investors.index', compact('investments'));
    }
}
