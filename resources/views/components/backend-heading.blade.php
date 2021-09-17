<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                {{ $slot }}
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                @isset($right)
                <div class="float-start float-lg-end">
                    {{ $right }}
                </div>
                @endisset

                @isset($navigation)
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                        {{ $navigation }}
                    </ol>
                </nav>
                @endisset
            </div>
        </div>
    </div>
</div>
