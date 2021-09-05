@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-7">
            @include('pitch.wizard-head', ['step' => 3])
            <form action="{{ route('pitches.store.step-three', $pitchForm) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <x-box class="shadow-sm p-4">
                    <x-form-group>
                        <label class="form-label">Cover Image</label>
                        <input type="file" name="cover_image" class="form-control {{ invalid_class('cover_image') }}" accept="image/*">
                        <x-invalid-feedback field="cover_image"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <label class="form-label">Logo</label>
                        <input type="file" name="logo" class="form-control {{ invalid_class('logo') }}" accept="image/*">
                        <x-invalid-feedback field="logo"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <button type="submit" class="btn btn-primary py-3 w-100">Save & Continue</button>
                    </x-form-group>
                </x-box>
            </form>
        </div>
    </div>
</div>
@endsection
