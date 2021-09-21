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

                <div class="row">
                    <div class="col-md-6">
                        <x-form-group>
                            <label class="form-label">Image</label>
                            <input type="file" name="image" class="form-control {{ invalid_class('image') }}" accept="image/*">
                            <x-invalid-feedback field="image"></x-invalid-feedback>
                        </x-form-group>

                        @if($updateMode && $industry->image)
                        <div class="mb-3">
                            <img class="img-thumbnail" src="{{ $industry->imageUrl() }}" alt="{{ $industry->name }}" style="max-height: 200px;">
                        </div>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <x-form-group>
                            <label class="form-label">Cover Image</label>
                            <input type="file" name="cover_image" class="form-control {{ invalid_class('cover_image') }}" accept="image/*">
                            <x-invalid-feedback field="cover_image"></x-invalid-feedback>
                        </x-form-group>

                        @if($updateMode && $industry->cover_image)
                        <div class="mb-3">
                            <img class="img-thumbnail" src="{{ $industry->coverImageUrl() }}" alt="{{ $industry->name }}" style="max-height: 200px;">
                        </div>
                        @endif
                    </div>
                </div>

                <x-form-group>
                    <label class="form-label">Content</label>
                    <textarea name="content" class="ckeditor form-control  {{ invalid_class('content') }}" cols="30" rows="10">{{ old('content', $industry->content) }}</textarea>
                    <x-invalid-feedback field="content"></x-invalid-feedback>
                </x-form-group>

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
@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>

<style>
    .ck-editor__editable {
        height: 500px !important;
    }

</style>
<script>
    ClassicEditor
        .create(document.querySelector('.ckeditor'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });

</script>
@endpush
@endsection
