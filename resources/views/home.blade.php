@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 mb-4">
            <a href="{{ route('pitches.create.step-one') }}" class="d-block" style="border: 1px dashed #d2e5ff; background-color: #fbfdff; text-decoration: none;">
                <div class="p-5 text-center">
                    <i class="fa fa-plus" style="font-size: 4rem;"></i>
                    <h4 class="h4-responsive mt-3">Add New pitch</h4>
                </div>
            </a>
        </div>
        @foreach ($pitches as $pitch)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ $pitch->cover_image ?? 'https://www.angelinvestmentnetwork.co.uk/assets/img/industries/2/landscape/19-min.jpg' }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $pitch->title }}</h5>
                    <p class="card-text">{{ $pitch->short_summary }}</p>
                    <div class="d-flex justify-content-between my-3">
                        <div>
                            <strong style="font-size: 1.1rem;">${{ $pitch->min_investment }}</strong>
                            <div>Minimum</div>
                        </div>
                        <div>
                            <strong style="font-size: 1.1rem;">${{ $pitch->max_investment }}</strong>
                            <div>Maximun</div>
                        </div>
                    </div>
                    <div class="text-center">
                        <a href="#" class="btn btn-primary btn-sm py-2">Manage my pitch</a>
                    </div>
                </div>
            </div>
    </div>
    {{-- End of columns --}}
        @endforeach
        @for ($i = 0; $i < 4; $i++) <div class="col-md-4 mb-4">
            <div class="card">
                <img src="https://www.angelinvestmentnetwork.co.uk/assets/img/industries/2/landscape/19-min.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Big Data SaaS Platform</h5>
                    <p class="card-text">Hurree Labs; Bringing data together to allow the most tailored experience for the audience; EIS Approved; Took part in Techstars; Silicon Valley Investors; huge growth.</p>
                    <div class="d-flex justify-content-between my-3">
                        <div>
                            <strong style="font-size: 1.1rem;">$11000</strong>
                            <div>Minimum</div>
                        </div>
                        <div>
                            <strong style="font-size: 1.1rem;">$19000</strong>
                            <div>Maximun</div>
                        </div>
                    </div>
                    <div class="text-center">
                        <a href="#" class="btn btn-primary btn-sm py-2">Manage my pitch</a>
                    </div>
                </div>
            </div>
    </div>
    {{-- End of columns --}}
    @endfor

</div>
</div>
@endsection
