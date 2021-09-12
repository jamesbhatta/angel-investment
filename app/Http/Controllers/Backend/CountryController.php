<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Service\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::orderBy('name')->latest()->get();
        return view('country.index', compact('countries'));
    }

    public function create()
    {
        return $this->showForm(new Country());
    }

    private function showForm(Country $country)
    {
        $updateMode = false;
        if ($country->exists) {
            $updateMode = true;
        }

        return view('country.form', compact(['country', 'updateMode']));
    }

    public function store(Request $request, ImageService $imageService)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'nullable',
            'cover_image' => 'nullable',
        ]);

        $country = Country::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-')
        ]);

        if($request->hasFile('image')) {
            $country->image = $imageService->storeImage($request->file('image'));
            $country->save();
        }

        if($request->hasFile('cover_image')) {
            $country->cover_image = $imageService->storeImage($request->file('cover_image'));
            $country->save();
        }

        $this->flash()->success('Country added successfully.');

        return redirect()->route('backend.countries.index');
    }

    public function edit(Country $country)
    {
        return $this->showForm($country);
    }

    public function update(Request $request, Country $country, ImageService $imageService)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'image' => 'nullable',
            'cover_image' => 'nullable',
        ]);

        $country->update([
            'name' => $request->name,
            'slug' => Str::slug($request->slug, '-')
        ]);

        if($request->hasFile('image')) {
            $country->image = $imageService->swapImage($country->image, $request->file('image'));
            $country->save();
        }

        if($request->hasFile('cover_image')) {
            $country->cover_image = $imageService->swapImage($country->cover_image, $request->file('cover_image'));
            $country->save();
        }

        $this->flash()->success('Country updated successfully.');

        return redirect()->route('backend.countries.index');
    }

    public function destroy(Country $country)
    {
        $country->delete();
        
        $this->flash()->success('Country deleted successfully.');

        return redirect()->route('backend.countries.index');
    }
}
