<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        $testimonials = Testimonial::positioned()->get();

        return view('welcome', compact('testimonials'));
    }
}
