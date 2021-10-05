<div class="card">
    <img src="{{ $pitch->cover_image ? $pitch->coverImageUrl() : 'https://www.angelinvestmentnetwork.co.uk/assets/img/industries/2/landscape/19-min.jpg' }}" class="card-img-top" alt="...">
    <div class="card-body p-lg-4 pb-md-4">
        <h5 class="card-title">
            <a href="{{ route('business-proposals.show', $pitch) }}" class="line-clamp-2 font-arial" title="{{ $pitch->title }}" style="text-decoration: none; color: inherit;">{{ $pitch->title }}</a>
        </h5>
        <p class="card-text line-clamp-2 font-arial">{{ Illuminate\Support\Str::substr($pitch->short_summary, 0, 150); }}</p>
        <div class="d-flex justify-content-between my-3 font-arial">
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
            <a href="{{ route('business-proposals.show', $pitch) }}" class="btn btn-primary btn-sm py-2 px-3 font-arial">Find Out More</a>
        </div>
    </div>
</div>
