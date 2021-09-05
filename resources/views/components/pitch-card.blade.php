<div class="card">
    <img src="{{ $pitch->cover_image ? $pitch->coverImageUrl() : 'https://www.angelinvestmentnetwork.co.uk/assets/img/industries/2/landscape/19-min.jpg' }}" class="card-img-top" alt="...">
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
            <a href="{{ route('business-proposals.show', $pitch) }}" class="btn btn-primary btn-sm py-2">Find Out More</a>
        </div>
    </div>
</div>
