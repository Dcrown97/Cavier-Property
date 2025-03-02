@extends('layout.home')
@section('contents')
    <!-- Header Start -->
    <div class="container-fluid header bg-white p-0">
        <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
            <div class="col-md-6 p-5 mt-lg-5">
                <h1 class="display-5 animated fadeIn mb-4">Services</h1>
                <nav aria-label="breadcrumb animated fadeIn">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-body active" aria-current="page">Services</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 animated fadeIn">
                <img class="img-fluid" src="../real-estate-html-template/img/property-list1.jpeg" alt="">
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Category Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3">Services</h1>
                <p>Offered services</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-6 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="cat-item d-block bg-light text-center rounded p-3">
                        <div class="rounded p-4">
                            <h6>Marketing Sales and Rental</h6>
                            <span>Our team provides expert marketing services to help you sell or rent your property
                                quickly
                                and at the best price. We use a combination of traditional and digital marketing
                                strategies
                                to showcase your property to a broad audience. Whether you're looking to sell or rent
                                residential, commercial, or industrial properties, we ensure a smooth and efficient
                                process.</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="cat-item d-block bg-light text-center rounded p-3">
                        <div class="rounded p-4">
                            <h6>Buyer & Seller Representation</h6>
                            <span>We represent both buyers and sellers in real estate transactions, ensuring that your best
                                interests are protected. For sellers, we help you prepare your property, set the right
                                price, and negotiate favorable terms. For buyers, we assist in finding the perfect property
                                that meets your criteria, and guide you through the entire buying process.</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="cat-item d-block bg-light text-center rounded p-3">
                        <div class="rounded p-4">
                            <h6>Market Insight (Research Advisory and Valuation)</h6>
                            <span>Our team offers in-depth market research and advisory services to help you make informed
                                investment decisions. We provide accurate property valuations based on current market
                                trends, comparable properties, and economic conditions. Whether you're an investor,
                                developer, or individual buyer, our insights can help you maximize the value of your real
                                estate investments.</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="cat-item d-block bg-light text-center rounded p-3">
                        <div class="rounded p-4">
                            <h6>Property Asset Management</h6>
                            <span>We provide comprehensive property management services to help you maximize the return on
                                your real estate assets. From tenant management to maintenance and financial reporting, we
                                handle all aspects of property management so that you can focus on your investment. Whether
                                you own a single property or a large portfolio, our team ensures that your assets are
                                well-maintained and profitable.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Category End -->
@endsection
