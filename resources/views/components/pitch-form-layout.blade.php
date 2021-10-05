<div id="pitch-form-wrapper">
    {{-- <div class="pitchSlideShow"> --}}
    <div class="pitch-form-sidebar">
        <div class="mb-4">
            <div class="my-3" style="overflow-x: auto;">
                @if($updateMode)
                <a class="{{ $currentStep == 1 ? 'active' : 'btn-light' }} btn py-3 flex-shrink-0" href="{{ route('pitches.edit', $pitch) }}?step=1"><i class="far fa-edit"></i><span>Company Info</span></a>
                <a class="{{ $currentStep == 2 ? 'active' : 'btn-light' }} btn py-3 flex-shrink-0" href="{{ route('pitches.edit', $pitch) }}?step=2"><i class="fas fa-desktop"></i>Pitch & Deal</a>
                <a class="{{ $currentStep == 3 ? 'active' : 'btn-light' }} btn py-3 flex-shrink-0" href="{{ route('pitches.edit', $pitch) }}?step=3"><i class="fas fa-images"></i>Images</a>
                @else
                @if($pitchForm->exists)
                <a class="{{ $currentStep == 1 ? 'active' : 'btn-light' }} btn py-3 flex-shrink-0" href="{{ $currentStep > 1 ? route('pitches.create.step-one', $pitchForm) : '#' }}"><i class="far fa-edit"></i><span class="d-md-block d-none">Company Info</span></a>
                <a class="{{ $currentStep == 2 ? 'active' : 'btn-light' }} btn py-3 flex-shrink-0" href="{{ $currentStep > 2 ? route('pitches.create.step-two', $pitchForm) : '#' }}"><i class="fas fa-desktop"></i><span class="d-md-block d-none">Pitch & Deal</span></a>
                <a class="{{ $currentStep == 3 ? 'active' : 'btn-light' }} btn py-3 flex-shrink-0" href="{{ $currentStep > 3 ? route('pitches.create.step-three', $pitchForm) : '#' }}"><i class="fas fa-images"></i><span class="d-md-block d-none">Images</span></a>
                @else
                <a class="{{ $currentStep == 1 ? 'active' : 'btn-light' }} btn py-3 flex-shrink-0" href="#"><i class="far fa-edit"></i><span class="d-md-block d-none">Company Info</span></a>
                <a class="{{ $currentStep == 2 ? 'active' : 'btn-light' }} btn py-3 flex-shrink-0" href="#"><i class="fas fa-desktop"></i><span class="d-md-block d-none">Pitch & Deal</span></a>
                <a class="{{ $currentStep == 3 ? 'active' : 'btn-light' }} btn py-3 flex-shrink-0" href="#"><i class="fas fa-images"></i><span class="d-md-block d-none">Images</span></a>
                @endif
                <a class="{{ $currentStep == 4 ? 'active' : 'btn-light' }} btn py-3 flex-shrink-0" href="#"><i class="fas fa-box-open"></i><span class="d-md-block d-none">Package</span></a>
                <a class="{{ $currentStep == 5 ? 'active' : 'btn-light' }} btn py-3 flex-shrink-0" href="#"><i class="fas fa-credit-card"></i><span class="d-md-block d-none">Payment</span></a>
                @endif
            </div>
        </div>
    </div>
    <div class="form-content py-4">
        {{ $slot }}
    </div>
</div>

@push('scripts')
<style>
    footer {
        margin-top: 0 !important;
        display: none;
    }
</style>
@endpush