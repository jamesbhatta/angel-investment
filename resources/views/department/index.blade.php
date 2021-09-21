@extends('layouts.backend')

@section('content')
<x-backend-heading>
    <h3>Departments</h3>
    <x-slot name="navigation">
        <li class="breadcrumb-item" aria-current="page"><a href="/backend/departments">Departments</a></li>
    </x-slot>
</x-backend-heading>

<section>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{ $updateMode ? 'Edit' : 'Add New' }} Department</h4>
        </div>

        <div class="card-body">
            <form action="{{ $updateMode ? route('backend.departments.update', $department) : route('backend.departments.store') }}" method="Post" enctype="multipart/form-data">
                @csrf
                @if($updateMode)
                @method('put')
                @endif

                <x-text-field-group name="title" label="Department Title" value="{{ old('client_name', $department->title) }}"></x-text-field-group>
                <x-form-group>
                    <label class="form-label">Position</label>
                    <input type="number" name="position" class="form-control {{ invalid_class('position') }}" value="{{ old('position', $department->position) }}">
                    <x-invalid-feedback field="position"></x-invalid-feedback>
                </x-form-group>

                <x-form-group>
                    <button type="submit" class="btn btn-primary py-2 px-5">Save</button>
                </x-form-group>
            </form>
        </div>
    </div>
</section>

        
<x-backend-table>
    <x-slot name="thead">
        <th>#</th>
        <th>Title</th>
        <th>Position</th>
        <th>Action</th>
        </tr>
    </x-slot>
    @foreach ($departments as $department)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $department->title }}</td>
        <td>{{ $department->position }}</td>
        <td>
            <a href="{{ route('backend.departments.edit', $department) }}">Edit</a>
            <span class="mx-1">|</span>
            <form action="{{ route('backend.departments.destroy', $department) }}" method="POST" onsubmit="return confirm('Are you sure to delete?')" class="d-inline">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-link btn-sm p-0 text-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
    @if(!count($departments))
    <tr>
        <td colspan="42" class="text-center italic">No records found.</td>
    </tr>
    @endif
</x-backend-table>
@endsection
