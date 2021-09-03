<?php

namespace App\Http\Controllers;

use App\Models\Pitch;
use Illuminate\Http\Request;

class BusinessProposalController extends Controller
{
    public function index()
    {
        // TODO::only select verified
        $pitches = Pitch::verified(false)->latest()->get();

        return view('business-proposal.index', compact(['pitches']));
    }

    public function show(Pitch $pitch)
    {
        if (!$pitch->isVerified() && (auth()->check() && !auth()->user()->hasRole('admin'))) {
            abort(404);
        }

        $pitch->load('user');

        return view('business-proposal.show', compact(['pitch']));
    }
}
