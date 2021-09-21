@extends('layouts.backend')

@section('content')
<x-backend-heading>
    <h3>Testimonials</h3>
    <x-slot name="navigation">
        <li class="breadcrumb-item" aria-current="page"><a href="/backend/testimonial">Testimonials</a></li>
        <li class="breadcrumb-item active" aria-current="page">New</li>
    </x-slot>
</x-backend-heading>

<section>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{ $updateMode ? 'Edit' : 'Add New' }} Testimonial</h4>
        </div>
        <div class="card-body">
            <form action="{{ $updateMode ? route('backend.testimonials.update', $testimonial) : route('backend.testimonials.store') }}" method="Post" enctype="multipart/form-data">
                @csrf
                @if($updateMode)
                @method('put')
                @endif

                <x-text-field-group name="client_name" label="Client Name" value="{{ old('client_name', $testimonial->client_name) }}"></x-text-field-group>
                <x-text-field-group name="client_title" label="Client Title" value="{{ old('client_title', $testimonial->client_title) }}"></x-text-field-group>

                <x-form-group>
                    <label class="form-label">Position</label>
                    <input type="number" name="position" class="form-control {{ invalid_class('position') }}" value="{{ old('position', $testimonial->position) }}">
                    <x-invalid-feedback field="position"></x-invalid-feedback>
                </x-form-group>

                <x-form-group>
                    <label class="form-label">Client Photo</label>
                    <div class="d-flex">

                        @if($updateMode)
                        <div class="avatar avatar-lg me-2">
                            <img src="{{ $testimonial->clientPhotoUrl() }}">
                        </div>
                        @endif
                        <div class="align-self-center">
                            <input type="file" name="client_photo" class="form-control {{ invalid_class('client_photo') }}" accept="image/*">
                            <x-invalid-feedback field="client_photo"></x-invalid-feedback>
                        </div>
                    </div>
                </x-form-group>

                <x-textarea-group name="content" label="Content">{{ old('content', $testimonial->content) }}</x-textarea-group>

                <x-form-group>
                    <button type="submit" class="btn btn-primary py-2 px-5">Save</button>
                </x-form-group>
            </form>
        </div>
    </div>
</section>
@endsection
