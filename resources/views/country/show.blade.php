@extends('layouts.app')

@section('content')
{{-- <div class="banner"></div> --}}
<div style="background-size: cover; height: 300px;">
    <img class="w-100 h-100" src="{{ $country->coverImageUrl() }}" alt="{{ $country->name }}" style="object-fit: cover; object-position: center;">
</div>
<div class="container">
    <!-- country-details -->
    <section class="country-details">
        <div class="container-fluid">
            <div class="row">
                <div class="country-inner">
                    <div class="col-md-12">
                        @if($country->image)
                        <img src="{{ $country->imageUrl() }}" width="100%" alt="{{ $country->name }}">
                        @endif
                    </div>
                    <div class="col-xl-12">
                        <div class="section-title">
                            <h2> Gabriel Angel Investment Connecting {{ $country->name }} Entreprenures and Angel Investors.</h2>
                            <p>Where great business and great people meet we bring together business looking for Investment
                                and Investors with the capital, contacts and knowledge to help them success</p>
                        </div>
                        <br>
                        <div class="left-align">
                            <a href="/register" class="btn btn-primary rounded-0 px-4">Secure Capital</a>
                            <br>
                            <br>
                            <a href="/register" class="btn btn-primary rounded-0 px-4">Invest</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- country-details-end -->
</div>
@endsection
