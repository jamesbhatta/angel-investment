<?php

namespace App\Http\Controllers;

use App\Models\Pitch;
use Illuminate\Http\Request;

class BusinessProposalController extends Controller
{
    public function index()
    {
        $pitches = Pitch::verified()->latest()->get();

        return view('business-proposal.index', compact(['pitches']));
    }

    public function show(Pitch $pitch)
    {
        if (auth()->check() && (!auth()->user()->hasRole('admin'))) {
            if ($pitch->user_id != auth()->user()->id) {
                abort(404);
            }
        } else {
            if (!$pitch->isVerified()) {
                abort(404);
            }
        }

        $pitch->load('user');

        return view('business-proposal.show', compact(['pitch']));
    }
}
