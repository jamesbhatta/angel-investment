<?php

namespace App\Http\Controllers;

use App\Models\Pitch;
use Illuminate\Http\Request;

class BusinessProposalController extends Controller
{
    public function index()
    {
        $pitches = Pitch::verified()->latest()->paginate(15);

        return view('business-proposal.index', compact(['pitches']));
    }

    public function show(Pitch $pitch)
    {
        if (!auth()->user()->hasRole('admin')) {
            if (!$pitch->isVerified() && $pitch->user_id != auth()->user()->id) {
                abort(404);
            }
        }

        $pitch->load(['user', 'country']);

        return view('business-proposal.show', compact(['pitch']));
    }
}
