@extends('layouts.backend')

@section('content')
<x-backend-heading>
    <h3>Users</h3>
    <x-slot name="navigation">
        <li class="breadcrumb-item active" aria-current="page">Users</li>
    </x-slot>
</x-backend-heading>

<x-backend-table>
    <x-slot name="thead">
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Type</th>
        <th>Country</th>
        <th>Action</th>
    </x-slot>
    @foreach ($users as $user)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->mobile ?? '-' }}</td>
        <td>
            @foreach ($user->roles as $role)
            <div class="badge bg-primary text-capitalize"> {{ $role->name }}</div>
            @endforeach
        </td>
        <td>{{ $user->country->name ?? '-' }}</td>
        <td>
            <a href="{{ route('backend.users.show', $user) }}">View Details</a>

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
</x-backend-table>
@endsection
