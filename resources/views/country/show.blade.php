@extends('layouts.app')

@section('content')
<div class="banner">

</div>

<!-- country-details -->
<section class="country-details">
    <div class="container-fluid">
        <div class="row">
            
            <div class="country-inner">
                <div class="col-xl-12">
                    <div class="section-title">
                        <h2> Gabriel Angel Investment Connecting {{ $country->name }} Entreprenures and Angel Investors.</h2>
                        <p>Where great business and great people meet we bring together business looking for Investment
                            and Investors with the capital, contacts and knowledge to help them success</p>
                    </div>
                    
                    <br>
                    <div class="left-align">
                        <a class="btn btn-primary rounded-0 px-4">Secure Capital</a>
                        <br>
                        <br>
                        <button>Invest</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- country-details-end -->
@endsection