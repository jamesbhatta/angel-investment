@extends('layouts.app')

@section('content')
@php
$updateMode = isset($updateMode) ? $updateMode : false
@endphp
<x-pitch-form-layout :pitch="$pitch" :updateMode="$updateMode" current-step="3" :pitch-form="$pitchForm">
    <div class="container py-4">
        <form action="{{ $updateMode ? route('pitches.update.step-three', $pitch) : route('pitches.store.step-three', $pitchForm) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if($updateMode)
            @method('put')
            @endif
            <div class="row justify-content-center">
                <div class="col-md-6">

                    <div class="mb-3">
                        <strong class="mb-2 d-block">Cover Image</strong>
                        <div class="upload-boundary">
                            <img id="cover-image-preview" class="img-fluid rounded mb-3" src="https://dummyimage.com/1200x400/284ec9/ededed&text=Wide%20Cover%20Image" alt="">
                            <input type="file" id="cover-image" name="cover_image" accept="image/*" class="d-none" onchange="handleUploadPreview()" data-preview-el-id="cover-image-preview">
                            <label for="cover-image" class="upload-label">Upload Cover Image</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <strong class="mb-2 d-block">Logo</strong>
                        <div class="upload-boundary text-center">
                            <img id="logo-image-preview" class="img-fluid rounded mb-3" src="https://dummyimage.com/400x400/284ec9/ededed&text=Logo%20Here" alt="" style="max-height: 200px;">
                            <input type="file" id="logo" name="logo" accept="image/*" class="d-none" onchange="handleUploadPreview()" data-preview-el-id="logo-image-preview">
                            <label for="logo" class="upload-label">Upload Logo</label>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <x-form-group>
                        <button type="submit" class="btn btn-primary py-3 w-100">Save & Continue</button>
                    </x-form-group>
                </div>
            </div>
        </form>
    </div>
</x-pitch-form-layout>
@endsection

@push('scripts')
<script>
    function handleUploadPreview() {
        document.getElementById(event.target.dataset.previewElId).src = URL.createObjectURL(event.target.files[0]);
    }

</script>
@endpush
@push('styles')
<style>
    .upload-boundary {
        background: #fff;
        border: 1px solid #e2f3ff;
        padding: 28px;
        border-radius: 4px;
    }

    .upload-boundary .upload-label {
        display: block;
        text-align: center;
        font-weight: 600;
        border: 1px solid #B4C3D3;
        padding: 10px 15px;
        border-radius: 4px;
        background-color: #F2F6F9;
        color: #4F5766;
        letter-spacing: 0.025rem;
    }

    .upload-boundary .upload-label:hover {
        background: #EEF3F7;
        border: 1px solid #9CABB9;
        color: #253142;
    }

</style>
@endpush
