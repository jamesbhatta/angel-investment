<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Industry;
use Illuminate\Http\Request;

class IndustryController extends Controller
{
    public function index()
    {
        $industries = Industry::orderBy('title')->get();

        return view('industry.index', compact('industries'));
    }

    public function create()
    {
        return $this->showForm(new Industry(['is_active' => true]));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:industries,title',
            'is_active' => 'nullable',
        ]);

        Industry::create([
            'title' => $request->title,
            'is_active' => $request->is_active,
        ]);

        $this->flash()->success('Industry added successfully.');

        return redirect()->route('backend.industries.index');
    }

    public function edit(Industry $industry)
    {
        return $this->showForm($industry);
    }

    public function update(Request $request, Industry $industry)
    {
        $request->validate([
            'title' => 'required',
            'is_active' => 'nullable',
        ]);

        $industry->update([
            'title' => $request->title,
            'is_active' => $request->is_active,
        ]);

        $this->flash()->success('Industry updated successfully.');

        return redirect()->route('backend.industries.index');
    }

    public function destroy(Industry $industry)
    {
        if (!$industry->canBeDeletedSafely()) {
            $this->flash()->success('Industry cannot be deleted safely. But you can still deactivate them.');
            return redirect()->back();
        }

        $industry->delete();

        $this->flash()->success('Industry deleted successfully.');
        return redirect()->route('backend.industries.index');
    }

    public function showForm(Industry $industry)
    {
        $updateMode = false;
        if ($industry->exists) {
            $updateMode = true;
        }

        return view('industry.form', compact('industry', 'updateMode'));
    }
}
