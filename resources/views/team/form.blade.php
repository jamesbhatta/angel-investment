@extends('layouts.backend')

@section('content')
<x-backend-heading>
    <h3>Teams</h3>
    <x-slot name="navigation">
        <li class="breadcrumb-item" aria-current="page"><a href="/backend/teams">Teams</a></li>
        <li class="breadcrumb-item active" aria-current="page">New</li>
    </x-slot>
</x-backend-heading>

<section>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{ $updateMode ? 'Edit' : 'Add New' }} Teams</h4>
        </div>
        <div class="card-body">
            <form action="{{ $updateMode ? route('backend.teams.update', $team) : route('backend.teams.store') }}" method="Post" enctype="multipart/form-data">
                @csrf
                @if($updateMode)
                @method('put')
                @endif

                <x-text-field-group name="name" label="Member Name" value="{{ old('name', $team->name) }}"></x-text-field-group>
                <x-text-field-group name="title" label="Client Title" value="{{ old('title', $team->title) }}"></x-text-field-group>

                <x-form-group>
                    <label class="form-label">Position</label>
                    <select name="team_department_id" class="form-select">
                        @foreach($departments as $department)
                        <option value="{{ $department->id }}" {{ $department->id == $team->team_department_id ? 'selected' : '' }}>{{ $department->title }}</option>
                        @endforeach
                    </select>
                </x-form-group>

                <x-form-group>
                    <label class="form-label">Position</label>
                    <input type="number" name="position" class="form-control {{ invalid_class('position') }}" value="{{ old('position', $team->position) }}">
                    <x-invalid-feedback field="position"></x-invalid-feedback>
                </x-form-group>

                <x-form-group>
                    <label class="form-label">Photo</label>
                    <div class="d-flex">

                        @if($updateMode)
                        <div class="avatar avatar-lg me-2">
                            <img src="{{ $team->photoUrl() }}">
                        </div>
                        @endif
                        <div class="align-self-center">
                            <input type="file" name="photo" class="form-control {{ invalid_class('photo') }}" accept="image/*">
                            <x-invalid-feedback field="photo"></x-invalid-feedback>
                        </div>
                    </div>
                </x-form-group>

                <x-textarea-group name="content" label="Content">{{ old('content', $team->content) }}</x-textarea-group>

                <x-form-group>
                    <button type="submit" class="btn btn-primary py-2 px-5">Save</button>
                </x-form-group>
            </form>
        </div>
    </div>
</section>
@endsection
