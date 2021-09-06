<div class="mb-4">
    <h4 class="h4-responsive">{{ $updateMode ? 'Manage' : 'New' }} Pitch</h4>
    <div class="btn-group d-flex  my-3" style=";">
        @if($updateMode)
        <a class="{{ $step == 1 ? 'btn-primary' : 'btn-light' }} btn py-3" href="{{ route('pitches.edit', $pitch) }}?step=1">Company Info</a>
        <a class="{{ $step == 2 ? 'btn-primary' : 'btn-light' }} btn py-3" href="{{ route('pitches.edit', $pitch) }}?step=2">Pitch & Deal</a>
        <a class="{{ $step == 3 ? 'btn-primary' : 'btn-light' }} btn py-3" href="{{ route('pitches.edit', $pitch) }}?step=3">Images</a>
        @else
        <a class="{{ $step == 1 ? 'btn-primary' : 'btn-light' }} btn py-3" href="{{ $step > 5 ? route('pitches.create.step-one', ) : '' }}">Company Info</a>
        <a class="{{ $step == 2 ? 'btn-primary' : 'btn-light' }} btn py-3" href="{{ $step > 5 ? route('pitches.create.step-one') : '' }}">Pitch & Deal</a>
        <a class="{{ $step == 3 ? 'btn-primary' : 'btn-light' }} btn py-3" href="#">Images</a>
        @endif
    </div>
</div>