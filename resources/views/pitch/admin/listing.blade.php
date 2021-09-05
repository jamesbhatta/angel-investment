@extends('layouts.backend')

@section('content')
<h4 class="h4-responsive">Pitches</h4>

<div>
    <table class="table">
        <thead class="bg-light">
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Submitted By</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pitches as $pitch)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pitch->title }}</td>
                <td>{{ $pitch->user->name }}</td>
                <td>{{ $pitch->isVerified() ? 'approved' : 'Unapproved' }}</td>
                <td>
                    <a href="{{ route('business-proposals.show', $pitch) }}">View Details</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
