@extends('front.includes.template')
@section('section')
    <!-- section home -->
    @include('front.pages.front.sections.home',[
        'habilities'    => $data->habilities,
        'socialMedia'   => $data->socialMedia,
        'name'          => $data->name,
    ])

    <!-- section about -->
     <!-- section home -->
     @include('front.pages.front.sections.about',[
        'about'                 => $data->about,
        'more'                  => $data->more,
        'percentage_habilities' => $data->percentage_habilities
    ])
    
    <!-- section services -->
    @include('front.pages.front.sections.services',[
        'services'              => $data->services
    ])

    {{-- types_experience --}}
    
    @include('front.pages.front.sections.experience',[
        'types_experience'              => $data->types_experience
    ])

    @include('front.pages.front.sections.works',[
        'type_works'                => $data->type_works,
        'works'                     => $data->works,
        'works_count'               => $data->works_count
    ])

{{--     
    <!-- section prices -->
    <section id="prices">

        <div class="container">

            <!-- section title -->
            <h2 class="section-title wow fadeIn">Pricing Plans</h2>

            <div class="spacer" data-height="60"></div>

            <div class="row">

                <div class="col-md-4 pr-md-0 mt-md-4 mt-0">
                    <!-- price item -->
                    <div class="price-item bg-white rounded shadow-dark text-center">
                        <img src="https://via.placeholder.com/80x80" alt="Regular" />
                        <h2 class="plan">Basic</h2>
                        <p>A Simple option but powerful to manage your business</p>
                        <p>Email support</p>
                        <h3 class="price"><em>$</em>9<span>Month</span></h3>
                        <a href="#" class="btn btn-default">Get Started</a>
                    </div>
                </div>

                <div class="col-md-4 px-md-0 my-4 my-md-0">
                    <!-- price item recommended-->
                    <div class="price-item bg-white rounded shadow-dark text-center best">
                        <span class="badge">Recommended</span>
                        <img src="https://via.placeholder.com/80x80" alt="Premium" />
                        <h2 class="plan">Premium</h2>
                        <p>Unlimited product including apps integrations and more features</p>
                        <p>Mon-Fri support</p>
                        <h3 class="price"><em>$</em>49<span>Month</span></h3>
                        <a href="#" class="btn btn-default">Get Started</a>
                    </div>
                </div>

                <div class="col-md-4 pl-md-0 mt-md-4 mt-0">
                    <!-- price item -->
                    <div class="price-item bg-white rounded shadow-dark text-center">
                        <img src="https://via.placeholder.com/80x80" alt="Ultimate" />
                        <h2 class="plan">Ultimate</h2>
                        <p>A wise option for large companies and individuals</p>
                        <p>24/7 support</p>
                        <h3 class="price"><em>$</em>99<span>Month</span></h3>
                        <a href="#" class="btn btn-default">Get Started</a>
                    </div>
                </div>

            </div>

        </div>

    </section> --}}

    <!-- section testimonials -->
    
    @include('front.pages.front.sections.testimonials')

    {{-- <!-- section blog -->
    <section id="blog">

        <div class="container">

            <!-- section title -->
            <h2 class="section-title wow fadeInUp">Latest Posts</h2>

            <div class="spacer" data-height="60"></div>

            <div class="row blog-wrapper">

                <div class="col-md-4">
                    <!-- blog item -->
                    <div class="blog-item rounded bg-white shadow-dark wow fadeIn">
                        <div class="thumb">
                            <a href="#">
                                <span class="category">Reviews</span>
                            </a>
                            <a href="#">
                                <img src="https://via.placeholder.com/330x215" alt="blog-title" />
                            </a>
                        </div>
                        <div class="details">
                            <h4 class="my-0 title"><a href="#">5 Best App Development Tool for Your Project</a></h4>
                            <ul class="list-inline meta mb-0 mt-2">
                                <li class="list-inline-item">09 February, 2020</li>
                                <li class="list-inline-item">Bolby</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <!-- blog item -->
                    <div class="blog-item rounded bg-white shadow-dark wow fadeIn">
                        <div class="thumb">
                            <a href="#">
                                <span class="category">Tutorial</span>
                            </a>
                            <a href="#">
                                <img src="https://via.placeholder.com/330x215" alt="blog-title" />
                            </a>
                        </div>
                        <div class="details">
                            <h4 class="my-0 title"><a href="#">Common Misconceptions About Payment</a></h4>
                            <ul class="list-inline meta mb-0 mt-2">
                                <li class="list-inline-item">07 February, 2020</li>
                                <li class="list-inline-item">Bolby</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <!-- blog item -->
                    <div class="blog-item rounded bg-white shadow-dark wow fadeIn">
                        <div class="thumb">
                            <a href="#">
                                <span class="category">Business</span>
                            </a>
                            <a href="#">
                                <img src="https://via.placeholder.com/330x215" alt="blog-title" />
                            </a>
                        </div>
                        <div class="details">
                            <h4 class="my-0 title"><a href="#">3 Things To Know About Startup Business</a></h4>
                            <ul class="list-inline meta mb-0 mt-2">
                                <li class="list-inline-item">06 February, 2020</li>
                                <li class="list-inline-item">Bolby</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section> --}}

    @include('front.pages.front.sections.contact')
    <script src="{{ asset('js/http.js') }}"></script>
    <script>
        window.onload = function() {
            // loadExperience("");
        };
    </script>
    <div class="spacer" data-height="96"></div>

@endsection
