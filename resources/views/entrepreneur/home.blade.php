@extends('layouts.app')

@section('content')
<div class="container my-4">
    <div class="row">
        <div class="col-md-4 mb-4">
            <a href="{{ route('pitches.create.step-one') }}" class="d-flex h-100 align-items-center justify-content-center" style="border: 1px dashed #d2e5ff; background-color: #fbfdff; text-decoration: none;">
                <div class="p-5 text-center">
                    <i class="fa fa-plus" style="font-size: 4rem;"></i>
                    <h4 class="h4-responsive mt-3">Add New pitch</h4>
                </div>
            </a>
        </div>
        @foreach ($pitches as $pitch)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ $pitch->cover_image ? $pitch->coverImageUrl() : 'https://www.angelinvestmentnetwork.co.uk/assets/img/industries/2/landscape/19-min.jpg' }}" class="card-img-top" alt="...">
                <div class="card-body font-arial">
                    <h5 class="card-title font-arial line-clamp-2" title="{{ $pitch->title }}">{{ $pitch->title }}</h5>

                    @if($pitch->isVerified())
                    <div class="badge bg-success">Approved</div>
                    @else
                    <div class="badge bg-danger">Not Approved</div>
                    @endif

                    <div class="line-clamp-1">
                        <p class="card-text line-clamp-2">{{ Illuminate\Support\Str::substr($pitch->short_summary, 0, 150); }}</p>
                    </div>

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
                    <div class="">
                        <a href="{{ route('pitches.edit', $pitch) }}" class="btn btn-primary btn-sm font-arial py-2">Manage my pitch</a>
                        <a href="{{ route('business-proposals.show', $pitch) }}" class="btn btn-primary btn-sm font-arial py-2">Find Out More</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- End of columns --}}
        @endforeach
    </div>
    
    @if($pitches->hasPages())
    <div class="d-flex justify-content-center">
        {{ $pitches->links() }}
    </div>
    @endif
</div>
@endsection
