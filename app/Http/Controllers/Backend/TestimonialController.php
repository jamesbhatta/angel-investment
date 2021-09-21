<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use App\Service\ImageService;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    private $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }
    public function index()
    {
        $testimonials = Testimonial::positioned()->get();

        return view('testimonial.index', compact('testimonials'));
    }

    public function create()
    {
        return $this->showForm(new Testimonial([
            'position' => Testimonial::getNextPosition()
        ]));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_name' => 'required',
            'client_title' => 'nullable',
            'content' => 'nullable',
            'position' => 'nullable',
            'client_photo' => 'nullable',
        ]);

        $testimonial = Testimonial::create([
            'client_name' => $request->client_name,
            'client_title' => $request->client_title,
            'content' => $request->content,
            'position' => $request->position,
        ]);

        if($request->hasFile('client_photo')) {
            $testimonial->client_photo = $this->imageService->swapImage($testimonial->client_photo, $request->file('client_photo'));
            $testimonial->save();
        }

        $this->flash()->success('Testimonial added successfully.');

        return redirect()->route('backend.testimonials.index');
    }

    public function edit(Testimonial $testimonial)
    {
        return $this->showForm($testimonial);
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'client_name' => 'required',
            'client_title' => 'nullable',
            'content' => 'nullable',
            'position' => 'nullable',
            'client_photo' => 'nullable',
        ]);

        $testimonial->update([
            'client_name' => $request->client_name,
            'client_title' => $request->client_title,
            'content' => $request->content,
            'position' => $request->position,
        ]);

        if($request->hasFile('client_photo')) {
            $testimonial->client_photo = $this->imageService->swapImage($testimonial->client_photo, $request->file('client_photo'));
            $testimonial->save();
        }

        $this->flash()->success('Testimonial updated successfully.');

        return redirect()->route('backend.testimonials.index');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        $this->flash()->success('Testimonial deleted successfully.');
        return redirect()->route('backend.testimonials.index');
    }

    public function showForm(Testimonial $testimonial)
    {
        $updateMode = false;
        if ($testimonial->exists) {
            $updateMode = true;
        }

        return view('testimonial.form', compact('testimonial', 'updateMode'));
    }
}
