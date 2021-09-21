@extends('layouts.app')

@push('styles')
<style>
    .pitch-title {
        color: #1976d2;
        font-weight: 600;
        text-decoration: none;
    }
</style>
@endpush

@section('content')
<div class="bg-light">

    <div class="container py-5">
        <div class="card">
            <div class="card-header bg-white py-4">
                <h4 class="h4-responsive">My Investors ({{ $investments->total() }})</h4>
            </div>
            <div class="card-body">
                @forelse ($investments as $investment)
                <div class="row  py-3">
                    <div class="col-md-7 row">
                        <div class="col-md-4">
                            <div class="pb-1">
                                Initiated <span class="nowrap">{{ $investment->created_at->format('M d, Y') }}</span>
                            </div>
                            <small><span class="text-muted">{{ $investment->created_at->diffForHumans() }}</span></small>
                        </div>
                        <div class="col-md-8">
                            <a class="pitch-title" href="{{ route('business-proposals.show', $investment->pitch) }}">{{ $investment->pitch->title }}</a>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div>
                            {{ $investment->investor->name }}
                        </div>
                    </div>
                </div>
                @empty
                <div class="text-center">
                    <img src="/img/no-data.svg" style="max-height: 200px;">
                    <div class="mt-3" style="font-weight: 600;">
                        You have not made any investment yet. <br> Hurry up.
                    </div>
                </div>
                @endforelse
            </div>

        </div>

        @if($investments->hasPages())
        <div class="d-flex justify-content-end mt-4">
            {{ $investments->links() }}
        </div>
        @endif
    </div>

    @endsection
