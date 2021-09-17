@extends('layouts.backend')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Pitches</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pitches</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>


<div class="section">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-lg">
                    <thead class="text-uppercase">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Submitted By</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pitches as $pitch)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pitch->title }}</td>
                            <td>{{ $pitch->user->name }}</td>
                            <td>{{ $pitch->isVerified() ? 'approved' : 'Unapproved' }}</td>
                            <td>
                                <a href="{{ route('business-proposals.show', $pitch) }}">View Details</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
