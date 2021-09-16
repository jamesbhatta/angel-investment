<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Investment;
use Illuminate\Http\Request;

class InvestmentController extends Controller
{
    public function index()
    {
        $investments = Investment::with('pitch.industry')
        ->latest()->paginate();

        return view('investment.listing', compact('investments'));
    }
}
