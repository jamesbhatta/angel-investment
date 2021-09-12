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
                    <input class="form-check-input" type="radio" name="package_id" id="package-1" value="1">
                    <input class="form-check-input" type="radio" name="package_id" id="package-2" value="2">
                    <input class="form-check-input" type="radio" name="package_id" id="package-3" value="3">


                    <x-form-group>
                        <button type="submit" class="btn btn-primary py-3 w-100">Save & Continue</button>
                    </x-form-group>
                </x-box>
            </form>
        </div>
    </div>
</div>
@endsection
