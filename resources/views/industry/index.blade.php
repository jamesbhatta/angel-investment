@extends('layouts.backend')

@section('content')
<x-backend-heading>
    <h3>Industries</h3>
    <x-slot name="right">
        <a class="btn btn-primary" href="/backend/industry/create">Add Industry</a>
    </x-slot>
</x-backend-heading>

<x-backend-table>
    <x-slot name="thead">
        <th>#</th>
        <th>Title</th>
        <th>Status</th>
        <th>Action</th>
        </tr>
    </x-slot>
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
</x-backend-table>
@endsection
