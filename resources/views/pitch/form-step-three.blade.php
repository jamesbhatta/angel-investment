@extends('layouts.app')

@section('content')
@php
$updateMode = isset($updateMode) ? $updateMode : false
@endphp
<div class="pitchSlideShow">
    @include('pitch.wizard-head', ['step' => 3])
</div>
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="offset-sm-1 offset-2 col-9">


            <form action="{{ $updateMode ? route('pitches.update.step-three', $pitch) : route('pitches.store.step-three', $pitchForm) }}" method="POST" enctype="multipart/form-data" >
                @csrf
                @if($updateMode)
                @method('put')
                @endif

                <x-box class="shadow-sm p-4">
                    <div class="row">
                        <div class="col-md-6">
                            <x-form-group>
                                <label class="form-label">Cover Image</label>
                                <div class="row">
                                    <div class="col-sm-12 imgUp">
                                        <div class="imagePreview"></div>
                                        <label class="btn btn-primary">
                                            Upload Cover Image
                                            <input type="file" name="cover_image" accept="image/*" class="uploadFile img {{ invalid_class('cover_image') }} " value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                                        </label>
                                    </div><!-- col-2 -->
                                    <!-- <i class="fa fa-plus imgAdd"></i> -->
                                </div><!-- row -->
                            </x-form-group>
                        </div>
                        <div class="col-md-6">
                            <x-form-group>
                                <label class="form-label">Logo</label>
                                <div class="row">
                                    <div class="col-sm-12 imgUp">
                                        <div class="imagePreview"></div>
                                        <label class="btn btn-primary">
                                            Upload Logo
                                            <input type="file" name="logo" accept="image/*" class="uploadFile img {{ invalid_class('cover_image')}} " value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                                        </label>
                                    </div><!-- col-2 -->
                                    <!-- <i class="fa fa-plus imgAdd"></i> -->
                                </div><!-- row -->
                            </x-form-group>
                        </div>
                    </div>
                    <!-- <x-form-group>
                        <label class="form-label">Cover Image</label>
                        <input type="file" name="cover_image" class="form-control {{ invalid_class('cover_image') }}" accept="image/*">
                        <x-invalid-feedback field="cover_image"></x-invalid-feedback>
                    </x-form-group> -->

                    <!-- <x-form-group>
                        <label class="form-label">Logo</label>
                        <input type="file" name="logo" class="form-control {{ invalid_class('logo') }}" accept="image/*">
                        <x-invalid-feedback field="logo"></x-invalid-feedback>
                    </x-form-group> -->


                    <x-form-group>
                        <button type="submit" class="btn btn-primary py-3 w-100">Save & Continue</button>
                    </x-form-group>
                </x-box>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')

<script>
    // $(".imgAdd").click(function() {
    //     $(this).closest(".row").find('.imgAdd').before('<div class="col-sm-4 imgUp"><div class="imagePreview"></div><label class="btn btn-primary">Upload<input type="file" class="uploadFile img" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;"></label><i class="fa fa-times del"></i></div>');
    // });
    $(document).on("click", "i.del", function() {
        $(this).parent().remove();
    });
    $(function() {
        $(document).on("change", ".uploadFile", function() {
            var uploadFile = $(this);
            var files = !!this.files ? this.files : [];
            if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

            if (/^image/.test(files[0].type)) { // only image file
                var reader = new FileReader(); // instance of the FileReader
                reader.readAsDataURL(files[0]); // read the local file

                reader.onloadend = function() { // set image data as background of div
                    //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
                    uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url(" + this.result + ")");
                }
            }

        });
    });
</script>
@endpush
