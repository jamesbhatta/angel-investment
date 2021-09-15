@extends('layouts.backend')

@section('content')
<div class="d-flex mb-4">
    <h4 class="h4-responsive">Industries</h4>
    <div class="ms-auto">
        <a href="/backend/industry/create">Add Industry</a>
    </div>
</div>

<div>
    <table class="table">
        <thead class="bg-light">
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($industries as $industry)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $industry->title }}</td>
                <td>{{ $industry->is_active ?  'Active' : 'Inactive' }}</td>
                <td>
                    <a href="{{ route('backend.industries.edit', $industry) }}">Edit</a>
                    <span class="mx-1">|</span>
                    <form action="{{ route('backend.industries.destroy', $industry) }}" method="POST" onsubmit="return confirm('Are you sure to delete?')" class="d-inline">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-link btn-sm p-0 text-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
            @if(!count($industries))
            <tr>
                <td colspan="42" class="text-center italic">No records found.</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
