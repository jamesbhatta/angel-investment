@extends('layouts.backend')

@section('content')
<x-backend-heading>
    <h3>Testimonials</h3>
    <x-slot name="right">
        <a class="btn btn-primary" href="/backend/testimonial/create">Add Testimonial</a>
    </x-slot>
</x-backend-heading>

<x-backend-table>
    <x-slot name="thead">
        <th>#</th>
        <th>Client</th>
        <th>Client Title</th>
        <th>Status</th>
        <th>Action</th>
        </tr>
    </x-slot>
    @foreach ($testimonials as $testimonial)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>
            <div class="d-flex align-items-center">
                <div class="avatar avatar-md">
                    <img src="{{ $testimonial->clientPhotoUrl() }}">
                </div>
                <p class="font-bold ms-3 mb-0">{{ $testimonial->client_name }}</p>
            </div>
            </td>
        <td>{{ $testimonial->client_title }}</td>
        <td>{{ $testimonial->position }}</td>
        <td>
            <a href="{{ route('backend.testimonials.edit', $testimonial) }}">Edit</a>
            <span class="mx-1">|</span>
            <form action="{{ route('backend.testimonials.destroy', $testimonial) }}" method="POST" onsubmit="return confirm('Are you sure to delete?')" class="d-inline">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-link btn-sm p-0 text-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
    @if(!count($testimonials))
    <tr>
        <td colspan="42" class="text-center italic">No records found.</td>
    </tr>
    @endif
</x-backend-table>
@endsection
