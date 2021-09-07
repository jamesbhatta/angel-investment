@extends('layouts.app')

@section('content')
<div id="pitch-{{ $pitch->id }}">
    @if($pitch->cover_image)
    <div>
        <img class="img-fluid w-100" src="{{ $pitch->coverImageUrl() }}" alt="{{ $pitch->title }}">
    </div>
    @endif
    <div class="container @if(!$pitch->cover_image) mt-4 @endif">
        <div class="d-md-flex">
            <div>
                <img class="img-thumbnail" src="{{ $pitch->logo ? $pitch->logoUrl() : asset('img/no-logo.png') }}" alt="{{ $pitch->title }}" style="height: 150px; width: 150px; @if($pitch->cover_image) margin-top: -30px; @endif">
            </div>
            <div class="ms-md-5 py-3 flex-grow-1">
                <h1 class="fs-4 font-weight-bold"><strong>{{ $pitch->title }}</strong></h1>
                <div><span class="text-primary">⦿</span> {{ $pitch->industry }}</div>
                <div>
                    <span class="text-primary me-2"><i class="fa fa-map-marker-alt"></i></span>
                    <span>{{ $pitch->country->name ?? '' }}</span>
                </div>
            </div>
            <div class="py-3 align-self-center">
                <a class="btn btn-primary" href="#">I'm Interested</a>
            </div>
        </div>

        <x-pitch-admin-action-bar :pitch="$pitch"></x-pitch-admin-action-bar>

        <div class="row flex-column-reverse flex-md-row">
            <div class="col-md-8">
                <x-pitch-section-box>
                    <x-slot name="title">Short Summary</x-slot>
                    <p>
                        {!! $pitch->short_summary !!}
                    </p>
                </x-pitch-section-box>
                {{-- <x-pitch-section-box>
                    <x-slot name="title">Highlights</x-slot>
                    <ul class="">
                        <li>
                            Spin-Lock is highly disruptive and will transform the market
                        </li>
                        <li>
                            Spin-Lock has a killer USP
                        </li>
                        <li>
                            Spin-Lock has no effective commercial competition
                        </li>
                        <li>
                            Branded sales account for 78% of the market
                        </li>
                        <li>
                            The market audience is concentrated in just a handful of Youtube channels
                        </li>
                    </ul>
                </x-pitch-section-box> --}}

                @if($pitch->the_business)
                <x-pitch-section-box>
                    <x-slot name="title">The Business</x-slot>
                    <p>{!! $pitch->the_business !!}</p>
                </x-pitch-section-box>
                @endif

                @if($pitch->the_market)
                <x-pitch-section-box>
                    <x-slot name="title">The Market</x-slot>
                    <p>{!! $pitch->the_market !!}</p>
                </x-pitch-section-box>
                @endif

                @if($pitch->progress)
                <x-pitch-section-box>
                    <x-slot name="title">Progress/Proof</x-slot>
                    <p>{!! $pitch->progress !!}</p>
                </x-pitch-section-box>
                @endif

                @if($pitch->objectives)
                <x-pitch-section-box>
                    <x-slot name="title">Objectives/Future</x-slot>
                    <p>{!! $pitch->objectives !!}</p>
                </x-pitch-section-box>
                @endif

            </div>
            <div class="col-md-4">
                <div class="my-4">
                    <h4 class="h4-responsive">Overview</h4>
                    <table class="table pitch-overview-table">
                        <tr>
                            <td>Target</td>
                            <th>{{ priceUnit() }}{{ $pitch->max_investment }}</th>
                        </tr>
                        <tr>
                            <td>Minimum</td>
                            <th>{{ priceUnit() }}{{ $pitch->min_investment }}</th>
                        </tr>
                        <tr>
                            <td>Investment Raised</td>
                            <th>{{ $pitch->capital ? priceUnit() . $pitch->capital : 'N/A' }}</th>
                        </tr>
                        {{-- <tr>
                        <td>Previous Rounds</td>
                        <th>N/A</th>
                    </tr> --}}
                        <tr>
                            <td>Stage</td>
                            <th>{{ $pitch->stage }}</th>
                        </tr>
                        <tr>
                            <td>Investor Role</td>
                            <th>{{ $pitch->investor_role }}</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('styles')
<style>
    .pitch-overview-table th {
        text-align: right;
    }

</style>
@endpush
