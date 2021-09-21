@extends('layouts.backend')

@section('content')
<x-backend-heading>
    <h3>User Details</h3>
    <x-slot name="navigation">
        <li class="breadcrumb-item active" aria-current="page"><a href="/backend/users">Users</a></li>
        <li class="breadcrumb-item active" aria-current="page">View</li>
    </x-slot>
</x-backend-heading>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-4 mb-3">Full Name</div>
            <div class="col-8 mb-3">{{ $user->name }}</div>

            <div class="col-4 mb-3">Email</div>
            <div class="col-8 mb-3">{{ $user->email }}</div>

            <div class="col-4 mb-3">Contact</div>
            <div class="col-8 mb-3">{{ $user->mobile ?? '-' }}</div>

            <div class="col-4 mb-3">Country</div>
            <div class="col-8 mb-3">{{ $user->country->name ?? '-' }}</div>

            <div class="col-4 mb-3">User Type</div>
            <div class="col-8 mb-3">
                @foreach ($user->roles as $role)
                <div class="badge bg-primary text-capitalize"> {{ $role->name }}</div>
                @endforeach
            </div>

        </div>

        

    </div>
</div>

@endsection
