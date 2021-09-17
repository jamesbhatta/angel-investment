@extends('layouts.backend')

@section('content')
<x-backend-heading>
    <h3>Countries</h3>
    <x-slot name="right">
        <a href="/backend/countries/create" class="btn btn-primary">Add Country</a>
    </x-slot>
</x-backend-heading>

<div class="card">
    <div class="card-content">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-lg">
                    <thead>
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
        </div>
    </div>
</div>
@endsection
