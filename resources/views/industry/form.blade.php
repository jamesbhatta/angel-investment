@extends('layouts.backend')

@section('content')
<x-backend-heading>
    <h3>Industries</h3>
    <x-slot name="navigation">
        <li class="breadcrumb-item" aria-current="page"><a href="/backend/industry">Industries</a></li>
        <li class="breadcrumb-item active" aria-current="page">New</li>
    </x-slot>
</x-backend-heading>

<section>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Add New Industry</h4>
        </div>
        <div class="card-body">
            <form action="{{ $updateMode ? route('backend.industries.update', $industry) : route('backend.industries.store') }}" method="Post" enctype="multipart/form-data">
                @csrf
                @if($updateMode)
                @method('put')
                @endif

                <x-text-field-group name="title" label="Title" value="{{ old('title', $industry->title) }}"></x-text-field-group>

                <x-form-group>
                    <div class="form-check">
                        <input name="is_active" class="form-check-input" type="checkbox" value="1" id="active-checkbox" @if(old('is_active', $industry->is_active)) checked @endif>
                        <label class="form-check-label" for="active-checkbox">
                          Is Active?
                        </label>
                      </div>
                </x-form-group>

                <x-form-group>
                    <button type="submit" class="btn btn-primary py-2 px-5">Save</button>
                </x-form-group>
            </form>
        </div>
    </div>
</section>
@endsection
