<div class="mb-4">
    <div class="btn-group d-flex flex-column flex-nowrap my-3" style="overflow-x: auto;">
        @if($updateMode)
        <a class="{{ $step == 1 ? 'btn-primary' : 'btn-light' }} btn py-3 flex-shrink-0" href="{{ route('pitches.edit', $pitch) }}?step=1"><i class="far fa-edit"></i><span>Company Info</span></a>
        <a class="{{ $step == 2 ? 'btn-primary' : 'btn-light' }} btn py-3 flex-shrink-0" href="{{ route('pitches.edit', $pitch) }}?step=2">Pitch & Deal</a>
        <a class="{{ $step == 3 ? 'btn-primary' : 'btn-light' }} btn py-3 flex-shrink-0" href="{{ route('pitches.edit', $pitch) }}?step=3">Images</a>
        @else
        @isset($pitchform)
        <a class="{{ $step == 1 ? 'btn-primary' : 'btn-light' }} btn py-3 flex-shrink-0" href="{{ $step > 1 ? route('pitches.create.step-one', $pitchForm) : '#' }}"><i class="far fa-edit"></i><span class="d-md-block d-none">Company Info</span></a>
        <a class="{{ $step == 2 ? 'btn-primary' : 'btn-light' }} btn py-3 flex-shrink-0" href="{{ $step > 2 ? route('pitches.create.step-two', $pitchForm) : '#' }}"><i class="fas fa-desktop"></i><span class="d-md-block d-none">Pitch & Deal</span></a>
        <a class="{{ $step == 3 ? 'btn-primary' : 'btn-light' }} btn py-3 flex-shrink-0" href="{{ $step > 3 ? route('pitches.create.step-three', $pitchForm) : '#' }}"><i class="fas fa-images"></i><span class="d-md-block d-none">Images</span></a>
        @else
        <a class="{{ $step == 1 ? 'btn-primary' : 'btn-light' }} btn py-3 flex-shrink-0" href="#"><i class="far fa-edit"></i><span class="d-md-block d-none">Company Info</span></a>
        <a class="{{ $step == 2 ? 'btn-primary' : 'btn-light' }} btn py-3 flex-shrink-0" href="#"><i class="fas fa-desktop"></i><span class="d-md-block d-none">Pitch & Deal</span></a>
        <a class="{{ $step == 3 ? 'btn-primary' : 'btn-light' }} btn py-3 flex-shrink-0" href="#"><i class="fas fa-images"></i><span class="d-md-block d-none">Images</span></a>
        @endisset
        <a class="{{ $step == 4 ? 'btn-primary' : 'btn-light' }} btn py-3 flex-shrink-0" href="#"><i class="fas fa-box-open"></i><span class="d-md-block d-none">Package</span></a>
        <a class="{{ $step == 5 ? 'btn-primary' : 'btn-light' }} btn py-3 flex-shrink-0" href="#"><i class="fas fa-credit-card"></i><span class="d-md-block d-none">Payment</span></a>
        @endif
    </div>
</div>
