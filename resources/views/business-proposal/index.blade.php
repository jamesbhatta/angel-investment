@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="text-center mb-4">
        <h3 class="h3-responsive">Recent Business Proposals</h3>
        <p>Find business proposals and investment opportunities worldwide on the Angel Investment Network and connect with business entrepreneurs, start up companies, established businesses looking for funding</p>
    </div>

    <div class="row">
        @foreach ($pitches as $pitch)
        <div class="col-md-4 mb-4">
              <x-pitch-card :pitch="$pitch"></x-pitch-card>  
        </div>
            @endforeach
    </div>
</div>
@endsection