@extends('layouts.backend')

@section('content')
<div class="d-flex mb-4">
    <h4 class="h4-responsive">Countries</h4>
    <div class="ms-auto">
        <a href="/backend/countries/create">Add Country</a>
    </div>
</div>

<div>
    <table class="table">
        <thead class="bg-light">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($countries as $country)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $country->name }}</td>
                <td>{{ $country->slug }}</td>
                <td>{{ $country->active ?  'Active' : 'Inactive' }}</td>
                <td>
                    <a href="{{ route('backend.countries.edit', $country) }}">Edit</a>
                    <span class="mx-1">|</span>
                    <form action="{{ route('backend.countries.destroy', $country) }}" method="POST" onsubmit="return confirm('Are you sure to delete?')" class="d-inline">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-link btn-sm p-0 text-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
            @if(!count($countries))
            <tr>
                <td colspan="42" class="text-center italic">No records found.</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
