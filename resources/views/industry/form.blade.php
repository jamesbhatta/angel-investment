@extends('layouts.backend')

@section('content')
<div class="d-flex mb-4">
    <h4 class="h4-responsive">Industries</h4>
    <div class="ms-auto">
        <a href="/backend/industry/create">Add Industry</a>
    </div>
</div>

<section>
    <div class="card bg-light">
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
