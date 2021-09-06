@extends('layouts.app')

@push('styles')
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
@endpush
@section('content')
<div class="container py-4">
    <div class="text-center mb-4 md:mb-5">
        <h3 class="h3-responsive">Recent Business Proposals</h3>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <p>Find business proposals and investment opportunities worldwide on the Angel Investment Network and connect with business entrepreneurs, start up companies, established businesses looking for funding</p>
            </div>
        </div>
    </div>

    <div class="row" data-masonry='{ "percentPosition": true}'>
        @foreach ($pitches as $pitch)
        <div class="col-sm-6 col-lg-4 mb-4">
            <x-pitch-card :pitch="$pitch"></x-pitch-card>
        </div>
        @endforeach
        @foreach ($pitches as $pitch)
        <div class="col-sm-6 col-lg-4 mb-4">
            <x-pitch-card :pitch="$pitch"></x-pitch-card>
        </div>
        @endforeach
        @foreach ($pitches as $pitch)
        <div class="col-sm-6 col-lg-4 mb-4">
            <x-pitch-card :pitch="$pitch"></x-pitch-card>
        </div>
        @endforeach
    </div>
    @if($pitches->hasPages())
    <div class="d-flex justify-content-end">
        {{ $pitches->links() }}
    </div>
    @endif
</div>
@endsection
@push('scripts')
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.js"></script>
<script>
    var elem = document.querySelector('.grid');
    var msnry = new Masonry(elem, {
        // options
        itemSelector: '.grid-item'
        , columnWidth: 200
    });

    // element argument can be a selector string
    //   for an individual element
    var msnry = new Masonry('.grid', {
        // options
    });

</script>
@endpush
