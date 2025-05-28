@extends('layout.home')
<style>
    .property-item {
        display: flex;
        flex-direction: column;
        height: 100%;
        /* Makes sure the card takes the full height */
    }

    .property-item img {
        height: 200px;
        /* You can adjust this to fit your needs */
        object-fit: cover;
        /* Ensures the image maintains aspect ratio and fills the height */
        width: 100%;
        /* Ensures full width */
    }

    .property-item .p-4.pb-0 {
        flex-grow: 1;
        /* This allows the content to grow and push the button section down */
    }

    .property-item .d-flex.border-top {
        margin-top: auto;
        /* Forces the button section to stick to the bottom */
    }

    .property-item .d-flex.border-top.p-4 {
        margin-bottom: 0;
        /* Ensures uniform bottom padding */
    }
</style>
@section('contents')
    <!-- Header Start -->
    <div class="container-fluid header bg-white p-0">
        <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
            <div class="col-md-6 p-5 mt-lg-5">
                <h1 class="display-5 animated fadeIn mb-4">Find A <span class="text-primary">Perfect Home</span> To Live With
                    Your Family</h1>
                <p class="animated fadeIn mb-4 pb-2">We aim to achieve our vision through upholding our values of Intergrity,
                    Passion, professionalism and work.</p>
                <a href="/contact" class="btn btn-primary py-3 px-5 me-3 animated fadeIn">Get Started</a>
            </div>
            <div class="col-md-6 animated fadeIn">
                <div class="owl-carousel header-carousel">
                    <div class="owl-carousel-item">
                        <img class="img-fluid" src="./real-estate-html-template/img/hero-bg1.jpg" alt="">
                    </div>
                    <div class="owl-carousel-item">
                        <img class="img-fluid" src="./real-estate-html-template/img/hero-bg2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Search Start -->
    <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
        <div class="container">
            <form action="">
                <div class="row g-2">
                    <div class="col-md-10">
                        <div class="row g-2">
                            <div class="col-md-4">
                                <input type="text" name="search_name" class="form-control border-0 py-3"
                                    placeholder="Search Keyword">
                            </div>
                            <div class="col-md-4">
                                <select class="form-select border-0 py-3" name="property_type_id">
                                    <option value="">Select Property Type</option>
                                    @forelse ($propertyTypes as $propertyType)
                                        <option value="{{ $propertyType->id }}">{{ $propertyType->name }}</option>
                                    @empty
                                        <option value="others">No Property Type</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select class="form-select border-0 py-3" name="location_id">
                                    <option value="">Select Location</option>
                                    @forelse ($locations as $location)
                                        <option value="{{ $location->id ?? 'None' }}">{{ $location->name ?? 'None' }}
                                        </option>
                                    @empty
                                        <option value="others">No Location</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-dark border-0 w-100 py-3">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Property List Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                        <h1 class="mb-3">Property Listing</h1>
                        <p>Backed by data-driven strategy, Caviers listings spend 22 fewer days on market than the industry
                            average.</p>
                    </div>
                </div>
                <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                    <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-primary @if (!request('sale_type_id')) active @endif"
                                href="{{ route('properties.index') }}">All</a>
                        </li>
                        @if (isset($saleTypes))
                            @foreach ($saleTypes as $saleType)
                                <li class="nav-item me-2">
                                    <a class="btn btn-outline-primary @if (request('sale_type_id') == $saleType->id) active @endif"
                                        href="{{ route('properties.index', ['sale_type_id' => $saleType->id]) }}">{{ $saleType->name }}</a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        @forelse ($properties as $property)
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                @php
                                    // Decode the JSON-encoded images to get an array of filenames
                                    $images = json_decode($property->image);
                                    $firstImage = $images[0] ?? null; // Get the first image if available
                                @endphp
                                <div class="property-item rounded overflow-hidden">
                                    <div class="position-relative overflow-hidden">
                                        <a href="/property_details/{{ $property->id }}"><img class="img-fluid"
                                                src="{{ $firstImage ? asset('storage/properties/' . $firstImage) : '' }}"
                                                alt=""></a>
                                        <div
                                            class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                            {{ $property->saleType->name }}</div>
                                        <div
                                            class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                                            {{ $property->propertyType ? $property->propertyType->name : 'No Property Type' }}
                                        </div>
                                    </div>
                                    <div class="p-4 pb-0">
                                        @if (isset($property->price))
                                            <h5 class="text-primary mb-3">₦{{ number_format($property->price, 0) }}</h5>
                                        @endif
                                        <a class="d-block h5 mb-2"
                                            href="/property_details/{{ $property->id }}">{{ $property->name }}</a>
                                        <p><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $property->address }}
                                        </p>
                                    </div>
                                    <div class="d-flex border-top">
                                        @if (isset($property->square_footage))
                                            <small class="flex-fill text-center border-end py-2"><i
                                                    class="fa fa-ruler-combined text-primary me-2"></i>{{ $property->square_footage }}
                                                Sqft</small>
                                        @endif
                                        @if (isset($property->bed))
                                            <small class="flex-fill text-center border-end py-2"><i
                                                    class="fa fa-bed text-primary me-2"></i>{{ $property->bed }}</small>
                                        @endif
                                        @if (isset($property->bath))
                                            <small class="flex-fill text-center py-2"><i
                                                    class="fa fa-bath text-primary me-2"></i>{{ $property->bath }}</small>
                                        @endif
                                    </div>
                                    <div class="d-flex border-top p-4">
                                        <a href="/property_details/{{ $property->id }}"
                                            class="btn btn-sm btn-outline-primary flex-fill">
                                            <i class="fa fa-home"></i>
                                            View
                                        </a>
                                    </div>
                                </div>

                            </div>
                        @empty
                            <p>No Property</p>
                        @endforelse
                        <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                            <a class="btn btn-primary py-3 px-5" href="/property_list">Browse More Property</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Property List End -->

    <!-- Category Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3">Property Types</h1>
                <p>Our cohesive brand identity will elevate the style and story of your home.
                </p>
            </div>
            <div class="row g-4">
                @forelse ($propertyTypes as $propertyType)
                    @php
                        $count = App\Models\Property::where('property_type_id', $propertyType->id)->count();
                    @endphp
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid"
                                        src="{{ asset('storage/properttypes' . '/' . $propertyType->image) ?? '' }}"
                                        alt="Icon">
                                </div>
                                <h6>{{ $propertyType->name }}</h6>
                                <span>{{ $count }} Properties</span>
                            </div>
                        </a>
                    </div>
                @empty
                    <p>No Property Type</p>
                @endforelse
            </div>
        </div>
    </div>
    <!-- Category End -->

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="about-img position-relative overflow-hidden p-5 pe-0">
                        <img class="img-fluid w-100" src="./real-estate-html-template/img/about-bg1.jpg">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="mb-4">#1 Place To Find The Perfect Property</h1>
                    <p class="mb-4">Cavier Property is a property services company based in Lagos,
                        Nigeria. Our mandate is to provide quality service with a severe code of business conduct and
                        complete transparency for our clients. Our staff and directors have been in the real estate business
                        for decades with rich knowledge about the property market in Nigeria.</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Comprehensive Service</p>
                    <p><i class="fa fa-check text-primary me-3"></i> Professional Photography</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Expert Marketing</p>
                    <a class="btn btn-primary py-3 px-5 mt-3" href="/about">Read More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Mission & Vision Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="owl-carousel testimonial-carousel wow fadeInUp" id="mission-carousel" data-wow-delay="0.1s">
                <div class="testimonial-item bg-light rounded p-3">
                    <h1 class="text-center mx-auto mb-5 wow fadeInUp mb-3">Our Mission</h1>
                    <div class="bg-white border rounded p-4">
                        <p>Cavier properties is your personalized real estate broker. We have redefined business standards
                            through impartiality and honesty. We undergo each deal with intergrity and are determined to
                            bestow unrelenting effective and efficient customer service. Through our highly trained and
                            qualified agents coupled with our team of dynamic staff, the service you receive is incomparable
                            to that of competitors.</p>
                    </div>
                </div>
                <div class="testimonial-item bg-light rounded p-3">
                    <h1 class="text-center mx-auto mb-5 wow fadeInUp mb-3">Our Vision</h1>
                    <div class="bg-white border rounded p-4">
                        <p>At Cavier Properties, our mandate is to provide quality services in a result oriented manner with
                            complete transparency for our clients. Our goal is to succeed, enabling our diverse team of
                            valued employees to hold great accountability towards our prized customers.We aim high with
                            intergrity, diversification, consistency and outstanding customer service. We
                            are determined to be number 1.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mission & Vision End -->

    <!-- Video Section Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="bg-light rounded p-3">
                <div class="bg-white rounded p-4" style="border: 1px dashed rgba(0, 185, 142, .3)">
                    <div class="row g-5 align-items-center">
                        <div class="col-lg-12 wow fadeIn" data-wow-delay="0.1s">
                            <video id="hoverVideo" class="img-fluid rounded w-100" muted>
                                <source src="{{ asset('real-estate-html-template/img/cavier-gif-black-background.mp4') }}"
                                    type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video Section End -->

    <!-- Call to Action Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="bg-light rounded p-3">
                <div class="bg-white rounded p-4" style="border: 1px dashed rgba(0, 185, 142, .3)">
                    <div class="row g-5 align-items-center">
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                            <img class="img-fluid rounded w-100" src="./real-estate-html-template/img/call-to-action.jpg"
                                alt="">
                        </div>
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                            <div class="mb-4">
                                <h1 class="mb-3">Referral Program?</h1>
                                <p>Cavier Property Investment Limited Referral program is a commission-based program that
                                    helps you earn referral commissions when you refer someone to CWRE Ltd. you earn a
                                    commission starting from 10% on every closing made by the company from the clients that
                                    you
                                    referred. <br><br>
                                    Our goal is to help everyone have a seamless rest estate journey in Nigeria. Our
                                    referral
                                    program encourages and rewards you when you recommend our services to your friends,
                                    family
                                    and colleagues.
                                </p>
                            </div>
                            <a href="tel:+2349168686728" class="btn btn-primary py-3 px-4 me-2">
                                <i class="fa fa-phone-alt me-2"></i>Make A Call
                            </a>
                            <a href="/contact" class="btn btn-dark py-3 px-4"><i class="fa fa-calendar-alt me-2"></i>Get
                                Appoinment</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Call to Action End -->

    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3">Meet Our Team</h1>
                <p>Working with our in-house marketing and advertising agency, your agent will target the right audience
                    across the most effective channels.</p>
            </div>
            <div class="row g-4">
                @forelse ($propertyAgents as $propertyAgent)
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item rounded overflow-hidden d-flex flex-column" style="height: 100%;">
                            <div class="position-relative">
                                <img class="img-fluid"
                                    src="{{ asset('storage/propertyagents' . '/' . $propertyAgent->image) ?? '' }}"
                                    alt="" style="width: 100%; height: 300px; object-fit: cover;">
                                <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                    <a class="btn btn-square mx-1" title="{{ $propertyAgent->facebook_link }}"
                                        href="tel:{{ $propertyAgent->facebook_link }}"><i
                                            class="fab fa-whatsapp"></i></a>
                                    <a class="btn btn-square mx-1" title="{{ $propertyAgent->twitter_link }}"
                                        href="mailto:{{ $propertyAgent->twitter_link }}"><i
                                            class="fa fa-envelope"></i></a>
                                    <a class="btn btn-square mx-1" title="{{ $propertyAgent->instagram_link }}"
                                        href="tel:{{ $propertyAgent->instagram_link }}"><i class="fa fa-phone"></i></a>
                                </div>
                            </div>
                            <div class="text-center p-4 mt-auto">
                                <h5 class="fw-bold mb-0">{{ $propertyAgent->name }}</h5>
                                <small>{{ $propertyAgent->position }}</small>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>No Property Agent</p>
                @endforelse
            </div>
        </div>
    </div>
    <!-- Team End -->

    <!-- Testimonial Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3">Our Clients Say!</h1>
                <p>Our clients have found their dream homes and properties with us. Hear from them about their experience
                    with our dedicated team and exceptional service.</p>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" id="testimonial-carousel" data-wow-delay="0.1s">
                @forelse ($testimonials as $testimonial)
                    <div class="testimonial-item bg-light rounded p-3">
                        <div class="bg-white border rounded p-4">
                            <p>{{ $testimonial->content }}</p>
                            <div class="d-flex align-items-center">
                                {{-- <img class="img-fluid flex-shrink-0 rounded"
                                    src="{{ asset('storage/testimonials' . '/' . $testimonial->image) ?? '' }}"
                                    style="width: 45px; height: 45px;"> --}}
                                <div class="ps-3">
                                    <h6 class="fw-bold mb-1">{{ $testimonial->client_name }}</h6>
                                    {{-- <small>{{ $testimonial->profession }}</small> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>No Client Testimonials</p>
                @endforelse
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
@endsection
