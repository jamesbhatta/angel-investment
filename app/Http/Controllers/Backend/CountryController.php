<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Country;
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

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Country::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-')
        ]);

        $this->flash()->success('Country added successfully.');

        return redirect()->route('backend.countries.index');
    }

    public function edit(Country $country)
    {
        return $this->showForm($country);
    }

    public function update(Request $request, Country $country)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required'
        ]);

        $country->update([
            'name' => $request->name,
            'slug' => Str::slug($request->slug, '-')
        ]);

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
