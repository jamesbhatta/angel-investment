@extends('layouts.app')

@section('content')
<!-- hero-bg -->
<section class="hero-bg">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="hero-content">
                    <h2>Realising Ideas and implementing solution to global business.</h2>
                    <p>Strengthening the business communities and opening doors to the world of
                        opportunities, networks, skills, resources for both entrepreneurs and funders.</p>
                    <div class="d-flex justify-content-center align-items-center im">
                        <span class="iam">I'm looking to...</span>
                        <div class="dropdown">
                            <button class="btn iam-text dropdown-toggle text-white" type="button" id="action-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                Fundraise
                            </button>
                            <ul class="dropdown-menu w-100" aria-labelledby="action-dropdown">
                                <li><button class="dropdown-item iam-option" data-href="/register?role=entrepreneur" data-text="Fundraise">Fundraise</button></li>
                                <li><button class="dropdown-item iam-option" data-href="/register?role=investor" data-text="Invest">Invest</button></li>
                            </ul>
                        </div>
                    </div>
                    <a id="get-started-btn" class="d-inline-block btn getStart" href="/register?role=entrepreneur">Get Started</a>
                </div>
            </div>
        </div>
        @push('scripts')
        <script>
            $(function() {
                $('.iam-option').click(function(e) {
                    e.preventDefault();
                    $('#get-started-btn').attr('href', $(this).data('href'));
                    $('.iam-text').text($(this).data('text'));
                });
            });

        </script>
        @endpush
</section>
<!-- hero-bg end -->

<div class="service">
    <div class="section-title">
        <h2> Our difference: </h2>
        <p> <span>Not just funding....</span>we are here to make it happen.</p>
    </div>

    <div class="container">
        <div class="row align-items-stretch">
            <div class="col-md-4 mt-3 col-sm-6 mb-3">
                <div class="h-100" data-aos="fade-up" data-aos-duration="3000">
                    <div class="service-box h-100">
                        <div class="service-box-inner">
                            <span class="material-icons orange600">history_edu</span>
                            <h5>Education</h5>
                            <br>
                            <p>
                                Short courses that equip you with the much needed knowledge.
                                what does it take to be a great Entrepreneur, tools of trade, importance of
                                resources, networking.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-3 col-sm-6 mb-3">
                <div class="h-100" data-aos="fade-up" data-aos-duration="2500">
                    <div class="service-box h-100">
                        <div class="service-box-inner">
                            <span class="material-icons orange600">monitor_heart</span>
                            <h5>Mentorship for entrepreneurs</h5>
                            <br>
                            <p>Can get to choose a mentor to guide you through the journey of enterpreneurship.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-3 col-sm-6 mb-3">
                <div class="h-100" data-aos="fade-up" data-aos-duration="2000">
                    <div class="service-box h-100">
                        <div class="service-box-inner">
                            <span class="material-icons orange600">record_voice_over</span>
                            <h5>Presenters</h5>
                            <br>
                            <p>You need a professional presenter over a video call or a face to face meet with the
                                investors to make the strong impression of your brand and idea who backs your
                                passion and beliefs in the product.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-3 col-sm-6 mb-3">
                <div class="h-100" data-aos="fade-up" data-aos-duration="3000">
                    <div class="service-box h-100">
                        <div class="service-box-inner">
                            <span class="material-icons orange600">note_alt</span>
                            <h5>Professional pitch deck writers</h5>
                            <br>
                            <p>
                                Not everyone can articulate a eye catching pitch
                                that the investors want to see the key points and ideas to be centred and focused.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-3 col-sm-6 mb-3">
                <div class="h-100" data-aos="fade-up" data-aos-duration="2500">
                    <div class="service-box h-100">
                        <div class="service-box-inner">
                            <span class="material-icons orange600">account_balance_wallet</span>
                            <h5>Accountants</h5>
                            <br>
                            <p>
                                The need for a skilled accountant can never be underestimated when it comes to
                                structuring of business cross borders, share holding advice, company constitution
                                advice, international tax advice etc .
                            </p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-4 mt-3 col-sm-6 mb-3">
                <div class="h-100" data-aos="fade-up" data-aos-duration="2000">
                    <div class="service-box h-100">
                        <div class="service-box-inner">
                            <span class="material-icons orange600">gavel</span>
                            <h5>Legal professionals</h5>
                            <br>
                            <p>
                                Structuring the agreements cross borders, ongoing review and changes, applicable
                                licenses and laws.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-4 mt-3 col-sm-6 mb-3">
                <div class="h-100" data-aos="fade-up" data-aos-duration="3000">
                    <div class="service-box h-100">
                        <div class="service-box-inner">
                            <span class="material-icons orange600">campaign</span>
                            <h5>Influencers</h5>
                            <br>
                            <p>
                                You have a great product and need an influencer to create the viral effect?? Let's
                                talk .
                            </p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-4 mt-3 col-sm-6 mb-3">
                <div class="h-100" data-aos="fade-up" data-aos-duration="2500">
                    <div class="service-box h-100">
                        <div class="service-box-inner">
                            <span class="material-icons orange600">developer_mode</span>
                            <h5>Web Development</h5>
                            <br>
                            <p>Website is a business must have in this day and age. Design a professional and
                                presentable website.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-4 mt-3 col-sm-6 mb-3">
                <div class="h-100" data-aos="fade-up" data-aos-duration="2000">
                    <div class="service-box h-100">
                        <div class="service-box-inner">

                            <span class="material-icons orange600">devices</span>
                            <h5>Graphic Designing and Social Media</h5>
                            <br>
                            <p>Social Media coverage and Business Branding is key to business success.
                            </p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
<!-- service-end -->

<!-- our Newtwork -->
<section class="network">
    <div class="section-title">
        <h2> Select your location</h2>
        <div style="font-size: 2rem; font-weight: 600; color: #b4b2b2;">Our Network</div>
    </div>
    <div class="flags">
        <div class="container">
            <div class="row justify-content-center">
                @foreach(\App\Models\Country::positioned()->latest()->get() as $country)
                <div class="col-md-3 mt-4">
                    <a href="/country/{{ $country->slug }}">
                        @if($country->image)
                        <img src="{{ $country->imageUrl() }}" width="100%" alt="{{ $country->name }}">
                        @endif
                        <span>{{ $country->name }}</span>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- our Newtwork -end -->

<!-- featured -->
<section class="featured">
    <div class="container">
        <div class="section-title">
            <h2>Featured in</h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- ======= Cliens Section ======= -->
                <section id="cliens" class="cliens section-bg">
                    <div class="container">

                        <div class="row">

                            <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                                <img src="./img/clients/client-1.png" class="img-fluid" alt="">
                            </div>

                            <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                                <img src="./img/clients/client-2.png" class="img-fluid" alt="">
                            </div>

                            <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                                <img src="./img/clients/client-3.png" class="img-fluid" alt="">
                            </div>

                            <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                                <img src="./img/clients/client-4.png" class="img-fluid" alt="">
                            </div>

                            <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                                <img src="./img/clients/client-5.png" class="img-fluid" alt="">
                            </div>

                            <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                                <img src="./img/clients/client-6.png" class="img-fluid" alt="">
                            </div>

                        </div>
                        <div class="row align-items-center">

                            <div class="col-lg-3 col-md-6 col-6 d-flex align-items-center justify-content-center">
                                <img src="./img/clients/client-1.png" class="img-fluid" alt="">
                            </div>

                            <div class="col-lg-3 col-md-4 col-6 d-flex align-items-center justify-content-center">
                                <img src="./img/clients/client-2.png" class="img-fluid" alt="">
                            </div>

                            <div class="col-lg-3 col-md-4 col-6 d-flex align-items-center justify-content-center">
                                <img src="./img/clients/client-3.png" class="img-fluid" alt="">
                            </div>

                            <div class="col-lg-3 col-md-4 col-6 d-flex align-items-center justify-content-center">
                                <img src="./img/clients/client-4.png" class="img-fluid" alt="">
                            </div>

                        </div>

                    </div>
                </section><!-- End Cliens Section -->
            </div>
        </div>
    </div>
</section>
<!-- featured-end -->

<!-- Community -->
<section class="joinCommunity">
    <div class="container">
        <div class="section-title">
            <h2>Join our growing community of entrepreneurs and investors</h2>
            <p>We help investors and entrepreneurs build lasting and profitable relationships to build better
                businesses and brighter futures.</p>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="thumbnail card-view">
                    <div class="avatar-block">
                        <img class="img-circle" src="https://ain-resources.s3.eu-west-2.amazonaws.com/assets/users/1554878/profile_image_1611851361.png" alt=""> <br>
                        <span class="label label-info amt-range">
                            £1,000 -
                            £25,000 </span>
                    </div>
                    <div class="caption">
                        <p class="location"><i class="fas fa-map-marker-alt"></i>
                            Crewe,
                            United Kingdom </p>
                        <p class="background three-line">
                            I am looking to invest and potentially come on board with an investment to assist
                            towards the growth of the project. I have worked in both renewable energy and ... </p>
                        <h3><span class="editableLabel" labelid="global:area_of_expertiss">Areas of Expertise</span>
                        </h3>
                        <p class="one-line">
                            Media Content, Energy, Film
                        </p>
                        <div class="inv-action-btn">
                            <a class="btn btn-default" target="_blank" href="https://www.angelinvestmentnetwork.co.uk/angel-investors/hi-im-jack-am-look-crewe-1-1554878">Read
                                More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="thumbnail card-view">
                    <div class="avatar-block">
                        <img class="img-circle" src="https://ain-resources.s3.eu-west-2.amazonaws.com/assets/users/1565877/profile_image_1620029120.jpeg" alt=""> <br>
                        <span class="label label-info amt-range">
                            £1,000 -
                            £25,000 </span>
                    </div>
                    <div class="caption">
                        <p class="location"><i class="fas fa-map-marker-alt"></i>
                            Crewe,
                            United Kingdom </p>
                        <p class="background three-line">
                            I am looking to invest and potentially come on board with an investment to assist
                            towards the growth of the project. I have worked in both renewable energy and ... </p>
                        <h3><span class="editableLabel" labelid="global:area_of_expertiss">Areas of Expertise</span>
                        </h3>
                        <p class="one-line">
                            Media Content, Energy, Film
                        </p>
                        <div class="inv-action-btn">
                            <a class="btn btn-default" target="_blank" href="https://www.angelinvestmentnetwork.co.uk/angel-investors/hi-im-jack-am-look-crewe-1-1554878">Read
                                More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="thumbnail card-view">
                    <div class="avatar-block">
                        <img class="img-circle" src="https://ain-resources.s3.eu-west-2.amazonaws.com/assets/users/1649366/profile_image_1626707368.png" alt=""> <br>
                        <span class="label label-info amt-range">
                            £1,000 -
                            £25,000 </span>
                    </div>
                    <div class="caption">
                        <p class="location"><i class="fas fa-map-marker-alt"></i>
                            Crewe,
                            United Kingdom </p>
                        <p class="background three-line">
                            I am looking to invest and potentially come on board with an investment to assist
                            towards the growth of the project. I have worked in both renewable energy and ... </p>
                        <h3><span class="editableLabel" labelid="global:area_of_expertiss">Areas of Expertise</span>
                        </h3>
                        <p class="one-line">
                            Media Content, Energy, Film
                        </p>
                        <div class="inv-action-btn">
                            <a class="btn btn-default" target="_blank" href="https://www.angelinvestmentnetwork.co.uk/angel-investors/hi-im-jack-am-look-crewe-1-1554878">Read
                                More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Community-end -->

<!-- our-industry -->
<section class="ourIndustry">
    <div class="container">
        <div class="section-title">
            <h2>Our Industries</h2>
            <p>We connect investors with startups and businesses from all sectors to ensure the relationship is
                valuable to both parties.</p>
        </div>
        <industry-list-section></industry-list-section>
    </div>
</section>
<!-- our-industry-end -->

<!-- Testimonial -->
<section class="testimonial text-center">
    <div class="container">
        <div class="section-title">
            <h2>What our customers say</h2>
            <p>Over the past 15 years we’ve raised funding for thousands of businesses who have been kind enough to
                recognise our support:</p>
        </div>
        <div class="row">
            <div class="col">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($testimonials as $testimonial)
                        <div class="carousel-item @if($loop->iteration == 1) active @endif">
                            <div class="row justify-content-center">
                                <div class=" col-sm-11 col-md-9 col-lg-8 col-xl-7">
                                    <div class="card">
                                        <p class="post">
                                            <span><img class="quote-img" src="/img/i06xx2I.png"></span>
                                            <span class="post-txt">
                                                {{ $testimonial->content }}
                                            </span>
                                        </p>
                                    </div>
                                    <div class="arrow-down"></div>
                                    <div class="row d-flex justify-content-center align-items-center mt-2">
                                        <span>
                                            <img class="profile-pic fit-image" src="{{ $testimonial->clientPhotoUrl() }}" alt="{{ $testimonial->client_name }}">
                                        </span>
                                        <p class="profile-name">{{ $testimonial->client_name }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Testimonial-end -->

@endsection
