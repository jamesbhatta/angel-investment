@extends('layouts.backend')

@section('content')
<x-backend-heading>
    <h3>Teams</h3>
    <x-slot name="right">
        <a class="btn btn-primary" href="/backend/teams/create">Add Teams</a>
    </x-slot>
</x-backend-heading>

<x-backend-table>
    <x-slot name="thead">
        <th>#</th>
        <th>Member</th>
        <th>Member Title</th>
        <th>Department</th>
        <th>Position</th>
        {{-- <th>Status</th> --}}
        <th>Action</th>
        </tr>
    </x-slot>
    @foreach ($teams as $team)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>
            <div class="d-flex align-items-center">
                <div class="avatar avatar-md">
                    <img src="{{ $team->photoUrl() }}">
                </div>
                <p class="font-bold ms-3 mb-0">{{ $team->name }}</p>
            </div>
            </td>
        <td>{{ $team->title }}</td>
        <td>{{ $team->department->title ?? '-' }}</td>
        <td>{{ $team->position }}</td>
        {{-- <td>
            <div class="badge {{ $team->is_active ? 'bg-success' : 'bg-danger'; }}">{{ $team->is_active ? 'Active' : 'Inactive' }}</div>
        </td> --}}
        <td>
            <a href="{{ route('backend.teams.edit', $team) }}">Edit</a>
            <span class="mx-1">|</span>
            <form action="{{ route('backend.teams.destroy', $team) }}" method="POST" onsubmit="return confirm('Are you sure to delete?')" class="d-inline">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-link btn-sm p-0 text-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
    @if(!count($teams))
    <tr>
        <td colspan="42" class="text-center italic">No records found.</td>
    </tr>
    @endif
</x-backend-table>
@endsection
