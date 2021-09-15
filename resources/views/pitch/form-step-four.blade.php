@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-7">
            @php
            $updateMode = isset($updateMode) ? $updateMode : false
            @endphp
            @include('pitch.wizard-head', ['step' => 4])
            <form action="{{ $updateMode ? route('pitches.update.step-four', $pitch) : route('pitches.store.step-four', $pitch) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if($updateMode)
                @method('put')
                @endif
                <x-box class="shadow-sm p-4">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="package_id" id="starter-package-radio" value="1">
                        <label class="form-check-label" for="starter-package-radio">
                          Starter Package
                        </label>
                      </div>

                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="package_id" id="medium-package-radio" value="2">
                        <label class="form-check-label" for="medium-package-radio">
                          Medium Package
                        </label>
                      </div>

                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="package_id" id="executive-package-radio" value="3">
                        <label class="form-check-label" for="executive-package-radio">
                          Executive Package
                        </label>
                      </div>

                    <x-form-group>
                        <button type="submit" class="btn btn-primary py-3 w-100">Save & Continue</button>
                    </x-form-group>
                </x-box>
            </form>
        </div>
    </div>
</div>
@endsection
