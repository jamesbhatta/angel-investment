<?php

namespace App\Http\Controllers;

use App\Models\Pitch;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->hasrole('investor')) {
            return $this->investorHome();
        }
        return $this->entrepreneurHome();
    }

    private function investorHome()
    {
        return redirect()->route('business-proposals.index');
    }

    private function entrepreneurHome()
    {
        $pitches = Pitch::where('user_id', auth()->id())->latest()->simplePaginate();

        return view('home', compact(['pitches']));
    }
}
