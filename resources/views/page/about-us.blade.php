@extends('layouts.app')

@section('content')
<!-- Main Content -->
<section class="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="index.html">Home</a></li>
                <li>About Us</li>
            </ol>
            <h2>About Us</h2>

        </div>
    </section><!-- End Breadcrumbs -->


    <section class="aboutUs">

        <div class="container">

            <div class="row mb-5">

                <div class="section-title">
                    <h2>About US</h2>
                    <p>Who we are</p>
                </div>
                <div class="col-md-12">
                    <div class="about-section">

                        <p class="text-secondary">Our Story:
                            Our Journey started as financial advisors, business advisors and consultants. In our
                            journey
                            we realised the core to many great entrepreneur success stories was the need of the
                            Crucial
                            START-UP CAPITAL.

                            Our extensive journey as business ambassadors connecting trade and commerce associations
                            across the globe coupled with 1000's of investors from the Middle East, USA, UK, and
                            India
                            made us carve a path way for entrepreneurs to achieve funding, mentorship, access to
                            networks and access to the tools/resources of success.</p>

                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Our Team</h2>
                    </div>
                </div>
                @foreach ($departments as $department)
                @continue(!count($department->teams))
                <div class="row m-0 p-0 mt-4 ">
                    <div class="col-md-12 col-sm-12">
                        <h3 class="h3-responsive mb-4" style="font-weight: 700;">{{ $department->title }}</h3>
                    </div>
                    @foreach ($department->teams as $team)
                    <div class="col-md-4 col-sm-12 mt-4 ">
                        <div class="card">
                            <img src="{{ $team->photoUrl() }}" alt="{{ $team->nam }}">
                            <div class="container">
                                <h4 class="mt-2">{{ $team->name }}</h4>
                                <p class="title">{{ $team->title }}</p>
                                <p class="text-secondary">{!! $team->content !!}</p>
                                {{-- <p class="text-secondary">jane@example.com</p> --}}
                                {{-- <p><button class="button w-100">Contact</button></p> --}}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endforeach

                {{-- <div class="col-md-3 col-sm-12 ">
                    <div class="card">
                        <img src="./img/testi-1.png" alt="Jane" style="width:100%">
                        <div class="container">
                            <h4 class="mt-2">Jane Doe</h4>
                            <p class="title">CEO & Founder</p>
                            <p class="text-secondary">Some text that describes me lorem ipsum ipsum lorem.</p>
                            <p class="text-secondary">jane@example.com</p>
                            <p><button class="button w-100">Contact</button></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 ">
                    <div class="card">
                        <img src="img/testi-2.png" alt="Mike" style="width:100%">
                        <div class="container">
                            <h4 class="mt-2">Mike Ross</h4>
                            <p class="title">Art Director</p>
                            <p class="text-secondary">Some text that describes me lorem ipsum ipsum lorem.</p>
                            <p class="text-secondary">mike@example.com</p>
                            <p><button class="button w-100">Contact</button></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 ">
                    <div class="card">
                        <img src="img/testi-2.png" alt="John" style="width:100%">
                        <div class="container">
                            <h4 class="mt-2">John Doe</h4>
                            <p class="title">Designer</p>
                            <p class="text-secondary">Some text that describes me lorem ipsum ipsum lorem.</p>
                            <p class="text-secondary">john@example.com</p>
                            <p><button class="button w-100">Contact</button></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 ">
                    <div class="card">
                        <img src="./img/testi-1.png" alt="John" style="width:100%">
                        <div class="container">
                            <h4 class="mt-2">John Doe</h4>
                            <p class="title">Designer</p>
                            <p class="text-secondary">Some text that describes me lorem ipsum ipsum lorem.</p>
                            <p class="text-secondary">john@example.com</p>
                            <p><button class="button w-100">Contact</button></p>
                        </div>
                    </div>
                </div> --}}

            </div>
        </div>

    </section>
</section>

<!-- Main Content-end -->
@endsection
