<?php

namespace App\Http\Controllers;

use App\Models\TeamDepartment;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function aboutUs()
    {
        $departments = TeamDepartment::with('teams')->positioned()->get();

        return view('page.about-us', compact('departments'));
    }
}
