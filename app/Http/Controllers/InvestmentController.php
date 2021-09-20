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

    // API Endpoint: POST /investments/{pitch}
    public function store(Request $request, Pitch $pitch)
    {
        $request->validate([
            'investor_name' => 'required',
            'investor_mobile' => 'required',
            'message' => 'required'
        ]);

        Investment::create([
            'investor_id' => auth()->id(),
            'pitch_id' => $pitch->id,
            'message' => $request->message,
        ]);

        return response(['message' => 'Your investment request has been send successfully.'], 200);

        // return redirect()->route('investments.index')->with('invested-sucessfully', 'Invested successfully.');
    }
}
