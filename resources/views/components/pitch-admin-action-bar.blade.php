@hasrole('admin')
<div class="my-4">
    @if($pitch->isVerified())
    <a href="{{ route('pitches.unapprove', $pitch) }}" class="btn btn-danger">Unapprove</a>
    @else
    <a href="{{ route('pitches.approve', $pitch) }}" class="btn btn-success">Approve</a>
    @endif
</div>
@endhasrole