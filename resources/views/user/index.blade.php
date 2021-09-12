@extends('layouts.backend')

@section('content')
<div class="d-flex mb-4">
    <h4 class="h4-responsive">Users</h4>
    <div class="ms-auto">
    </div>
</div>

<div>
    <table class="table">
        <thead class="bg-light">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <td>Phone</td>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->mobile }}</td>
                <td>{{ $user->active ?  'Active' : 'Inactive' }}</td>
                <td>
                    {{-- <a href="{{ route('backend.countries.edit', $user) }}">Edit</a>
                    <span class="mx-1">|</span>
                    <form action="{{ route('backend.countries.destroy', $user) }}" method="POST" onsubmit="return confirm('Are you sure to delete?')" class="d-inline">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-link btn-sm p-0 text-danger">Delete</button>
                    </form> --}}
                </td>
            </tr>
            @endforeach
            @if(!count($users))
            <tr>
                <td colspan="42" class="text-center italic">No records found.</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
