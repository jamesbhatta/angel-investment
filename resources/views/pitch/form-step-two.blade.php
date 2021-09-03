@extends('layouts.app')

@section('content')

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-7">
            @include('pitch.wizard-head', ['step' => 2])
            <form action="{{ route('pitches.store.step-two', $pitchForm) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <x-box class="shadow-sm p-4">
                    <x-textarea-group name="short_summary" label="Short Summary"></x-textarea-group>

                    <x-textarea-group name="the_business" label="The Business"></x-textarea-group>

                    <x-textarea-group name="the_market" label="The Market"></x-textarea-group>

                    <x-textarea-group name="progress" label="Progress/Proof"></x-textarea-group>

                    <x-textarea-group name="objectives" label="Objectives/Future"></x-textarea-group>

                    <x-form-group>
                        <button type="submit" class="btn btn-primary py-3 w-100">Save & Continue</button>
                    </x-form-group>
                </x-box>
            </form>
        </div>
    </div>
</div>
@endsection
