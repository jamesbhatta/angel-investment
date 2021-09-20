@extends('layouts.backend')

@section('content')
<x-backend-heading>
    <h3>Countries</h3>
    <x-slot name="navigation">
        <li class="breadcrumb-item"><a href="/backend/countries">Countries</a></li>
        <li class="breadcrumb-item">New Country</li>
    </x-slot>
</x-backend-heading>

<section>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{ $updateMode ? 'Edit' : 'Add' }} Country</h4>
        </div>
        <div class="card-body">
            <form action="{{ $updateMode ? route('backend.countries.update', $country) : route('backend.countries.store') }}" method="Post" enctype="multipart/form-data">
                @csrf
                @if($updateMode)
                @method('put')
                @endif

                <x-text-field-group name="name" label="Country Name" value="{{ old('name', $country->name) }}"></x-text-field-group>

                @if($updateMode)
                <x-text-field-group name="slug" label="Slug" value="{{ old('slug', $country->slug) }}"></x-text-field-group>
                @endif

                <div class="row">
                    <div class="col-md-6">
                        <x-form-group>
                            <label class="form-label">Flag</label>
                            <input type="file" name="image" class="form-control {{ invalid_class('image') }}">
                            <x-invalid-feedback field="image"></x-invalid-feedback>
                        </x-form-group>

                        @if($updateMode && $country->image)
                        <div class="mb-3">
                            <img class="img-thumbnail" src="{{ $country->imageUrl() }}" alt="{{ $country->name }}" style="max-height: 200px;">
                        </div>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <x-form-group>
                            <label class="form-label">Cover Image</label>
                            <input type="file" name="cover_image" class="form-control {{ invalid_class('cover_image') }}">
                            <x-invalid-feedback field="cover_image"></x-invalid-feedback>
                        </x-form-group>

                        @if($updateMode && $country->cover_image)
                        <div class="mb-3">
                            <img class="img-thumbnail" src="{{ $country->coverImageUrl() }}" alt="{{ $country->name }}" style="max-height: 200px;">
                        </div>
                        @endif
                    </div>
                </div>

                <x-form-group>
                    <label class="form-label">Position</label>
                    <input type="number" name="position" class="form-control {{ invalid_class('position') }}" value="{{ old('position', $country->position) }}">
                    <x-invalid-feedback field="position"></x-invalid-feedback>
                </x-form-group>

                <x-form-group>
                    <button type="submit" class="btn btn-primary py-2 px-5">Save</button>
                </x-form-group>
            </form>
        </div>
    </div>
</section>
@endsection
