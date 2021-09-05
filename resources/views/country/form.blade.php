@extends('layouts.backend')

@section('content')
<div class="d-flex mb-4">
    <h4 class="h4-responsive">Countries</h4>
    <div class="ms-auto">
        <a href="/backend/countries/create">Add Country</a>
    </div>
</div>

<section>
    <div class="card bg-light">
        <div class="card-body">
            <form action="{{ $updateMode ? route('backend.countries.update', $country) : route('backend.countries.store') }}" method="Post">
                @csrf
                @if($updateMode)
                @method('put')
                @endif
                
                <x-text-field-group name="name" label="Country Name" value="{{ old('name', $country->name) }}"></x-text-field-group>
                
                @if($updateMode)
                <x-text-field-group name="slug" label="Slug" value="{{ old('slug', $country->slug) }}"></x-text-field-group>
                @endif
                
                <x-form-group>
                    <button type="submit" class="btn btn-primary py-2 px-5">Save</button>
                </x-form-group>
            </form>
        </div>
    </div>
</section>
@endsection