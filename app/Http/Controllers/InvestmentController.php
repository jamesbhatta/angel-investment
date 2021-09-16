<?php

namespace App\Http\Controllers;

use App\Models\Investment;
use App\Models\Pitch;
use Illuminate\Http\Request;

class InvestmentController extends Controller
{
    public function index()
    {
        $investments = Investment::with('pitch.industry')
            ->where('investor_id', auth()->id())
            ->latest()->paginate();

        return view('investment.index', compact('investments'));
    }

    public function store(Request $request, Pitch $pitch)
    {
        $request->validate([
            'message' => 'required'
        ]);

        Investment::create([
            'investor_id' => auth()->id(),
            'pitch_id' => $pitch->id,
            'message' => $request->message,
        ]);

        return redirect()->route('investments.index')->with('invested-sucessfully', 'Invested successfully.');
    }
}
