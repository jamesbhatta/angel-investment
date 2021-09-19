<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Industry;
use App\Service\ImageService;
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

    public function store(Request $request, ImageService $imageService)
    {
        $request->validate([
            'title' => 'required|unique:industries,title',
            'is_active' => 'nullable',
            'position' => 'nullable',
            'image' => 'nullable',
            'cover_image' => 'nullable',
            'content' => 'nullable',
        ]);

        $industry = Industry::create([
            'title' => $request->title,
            'is_active' => $request->is_active,
            'position' => $request->position,
            'content' => $request->content,
        ]);

        if($request->hasFile('image')) {
            $industry->image = $imageService->storeImage($request->file('image'));
            $industry->save();
        }

        if($request->hasFile('cover_image')) {
            $industry->cover_image = $imageService->storeImage($request->file('cover_image'));
            $industry->save();
        }

        $this->flash()->success('Industry added successfully.');

        return redirect()->route('backend.industries.index');
    }

    public function edit(Industry $industry)
    {
        return $this->showForm($industry);
    }

    public function update(Request $request, Industry $industry, ImageService $imageService)
    {
        $request->validate([
            'title' => 'required',
            'is_active' => 'nullable',
            'position' => 'nullable',
            'image' => 'nullable',
            'cover_image' => 'nullable',
            'content' => 'nullable',
        ]);

        $industry->update([
            'title' => $request->title,
            'is_active' => $request->is_active,
            'position' => $request->position,
            'content' => $request->content,
        ]);

        if($request->hasFile('image')) {
            $industry->image = $imageService->swapImage($industry->image, $request->file('image'));
            $industry->save();
        }

        if($request->hasFile('cover_image')) {
            $industry->cover_image = $imageService->swapImage($industry->cover_image, $request->file('cover_image'));
            $industry->save();
        }

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
