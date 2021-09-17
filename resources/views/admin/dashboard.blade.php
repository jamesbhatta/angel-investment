@extends('layouts.backend')

@section('content')
<x-backend-heading>
    <h3>Dashboard</h3>
</x-backend-heading>

    <div class="row">
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-3 py-4-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="stats-icon purple">
                                <i class="iconly-boldShow"></i>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h6 class="text-muted font-semibold">Pitches</h6>
                            <h6 class="font-extrabold mb-0">1212</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-3 py-4-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="stats-icon blue">
                                <i class="iconly-boldProfile"></i>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h6 class="text-muted font-semibold">Users</h6>
                            <h6 class="font-extrabold mb-0">183</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-3 py-4-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="stats-icon green">
                                <i class="iconly-boldAdd-User"></i>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h6 class="text-muted font-semibold">Investments</h6>
                            <h6 class="font-extrabold mb-0">44</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-3 py-4-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="stats-icon red">
                                <i class="iconly-boldBookmark"></i>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h6 class="text-muted font-semibold">Users</h6>
                            <h6 class="font-extrabold mb-0">1012</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h4>New Pitches</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-lg">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Submitted By</th>
                            <th>Submitted On</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="col-3">
                                    <p class="font-bold mb-0">Si Cantik</p>
                            </td>
                            <td class="col-auto">
                                <p class=" mb-0">Jane Doe</p>
                            </td>
                            <td class="col-auto">
                                <p class=" mb-0">12:00 PM</p>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-3">
                                    <p class="font-bold mb-0">Si Ganteng</p>
                            </td>
                            <td class="col-auto">
                                <p class=" mb-0">John Smith</p>
                            </td>
                            <td class="col-auto">
                                <p class=" mb-0">12:00 PM</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
