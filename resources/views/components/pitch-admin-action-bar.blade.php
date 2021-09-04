@hasrole('admin')
<div class="my-4">
    @if($pitch->isVerified())
    <a href="{{ route('pitchs.unapprove', $pitch) }}" class="btn btn-success">Unapprove</a>
    @else
    <a href="{{ route('pitchs.approve', $pitch) }}" class="btn btn-success">Approve</a>
    @endif
</div>
@endhasrole