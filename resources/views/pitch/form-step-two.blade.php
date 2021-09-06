@extends('layouts.app')

@section('content')

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-7">
            @php
            $updateMode = isset($updateMode) ? $updateMode : false
            @endphp
            @include('pitch.wizard-head', ['step' => 2, 'updateMode' => $updateMode])
            <form action="{{ $updateMode ? route('pitches.update.step-two', $pitch) : route('pitches.store.step-two', $pitchForm) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if($updateMode)
                @method('put')
                @endif
                <x-box class="shadow-sm p-4">
                    <x-textarea-group name="short_summary" label="Short Summary">{{ old('short_summary', $pitch->short_summary) }}</x-textarea-group>

                    <x-textarea-group name="the_business" label="The Business">{{ old('the_business', $pitch->the_business) }}</x-textarea-group>

                    <x-textarea-group name="the_market" label="The Market">{{ old('the_market', $pitch->the_market) }}</x-textarea-group>

                    <x-textarea-group name="progress" label="Progress/Proof">{{ old('progress', $pitch->progress) }}</x-textarea-group>

                    <x-textarea-group name="objectives" label="Objectives/Future">{{ old('objectives', $pitch->objectives) }}</x-textarea-group>

                    <x-form-group>
                        <button type="submit" class="btn btn-primary py-3 w-100">Save & Continue</button>
                    </x-form-group>
                </x-box>
            </form>
        </div>
    </div>
</div>
@endsection
