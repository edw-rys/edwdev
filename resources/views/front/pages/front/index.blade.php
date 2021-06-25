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

    <!-- section works -->
    <section id="works">

        <div class="container">

            <!-- section title -->
            <h2 class="section-title wow fadeInUp">Recent works</h2>

            <div class="spacer" data-height="60"></div>

            <!-- portfolio filter (desktop) -->
            <ul class="portfolio-filter list-inline wow fadeInUp">
                <li class="current list-inline-item" data-filter="*">Everything</li>
                <li class="list-inline-item" data-filter=".creative">Creative</li>
                <li class="list-inline-item" data-filter=".art">Art</li>
                <li class="list-inline-item" data-filter=".design">Design</li>
                <li class="list-inline-item" data-filter=".branding">Branding</li>
            </ul>

            <!-- portfolio filter (mobile) -->
            <div class="pf-filter-wrapper">
                <select class="portfolio-filter-mobile">
                    <option value="*">Everything</option>
                    <option value=".creative">Creative</option>
                    <option value=".art">Art</option>
                    <option value=".design">Design</option>
                    <option value=".branding">Branding</option>
                </select>
            </div>

            <!-- portolio wrapper -->
            <div class="row portfolio-wrapper">

                <!-- portfolio item -->
                <div class="col-md-4 col-sm-6 grid-item art">
                    <a href="https://via.placeholder.com/330x267" class="work-image">
                        <div class="portfolio-item rounded shadow-dark">
                            <div class="details">
                                <span class="term">Art</span>
                                <h4 class="title">Project Managment Illustration</h4>
                                <span class="more-button"><i class="icon-magnifier-add"></i></span>
                            </div>
                            <div class="thumb">
                                <img src="https://via.placeholder.com/330x267" alt="Portfolio-title" />
                                <div class="mask"></div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- portfolio item -->
                <div class="col-md-4 col-sm-6 grid-item creative design">
                    <a href="#small-dialog" class="work-content">
                        <div class="portfolio-item rounded shadow-dark">
                            <div class="details">
                                <span class="term">Creative</span>
                                <h4 class="title">Guest App Walkthrough Screens</h4>
                                <span class="more-button"><i class="icon-options"></i></span>
                            </div>
                            <div class="thumb">
                                <img src="https://via.placeholder.com/330x267" alt="Portfolio-title" />
                                <div class="mask"></div>
                            </div>
                        </div>
                    </a>
                    <div id="small-dialog" class="white-popup zoom-anim-dialog mfp-hide">
                        <img src="https://via.placeholder.com/590x280" alt="Title" />
                        <h2>Guest App Walkthrough Screens</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam hendrerit nibh in massa semper
                            rutrum. In rhoncus eleifend mi id tempus.</p>
                        <p>Donec consectetur, libero at pretium euismod, nisl felis lobortis urna, id tristique nisl lectus
                            eget ligula.</p>
                        <a href="#" class="btn btn-default">View on Dribbble</a>
                    </div>
                </div>

                <!-- portfolio item -->
                <div class="col-md-4 col-sm-6 grid-item branding">
                    <a href="https://www.youtube.com/watch?v=qf9z4ulfmYw" class="work-video">
                        <div class="portfolio-item rounded shadow-dark">
                            <div class="details">
                                <span class="term">Branding</span>
                                <h4 class="title">Delivery App Wireframe</h4>
                                <span class="more-button"><i class="icon-camrecorder"></i></span>
                            </div>
                            <div class="thumb">
                                <img src="https://via.placeholder.com/330x267" alt="Portfolio-title" />
                                <div class="mask"></div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- portfolio item -->
                <div class="col-md-4 col-sm-6 grid-item creative">
                    <a href="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/240233494&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true"
                        class="work-video">
                        <div class="portfolio-item rounded shadow-dark">
                            <div class="details">
                                <span class="term">Creative</span>
                                <h4 class="title">Onboarding Motivation</h4>
                                <span class="more-button"><i class="icon-music-tone-alt"></i></span>
                            </div>
                            <div class="thumb">
                                <img src="https://via.placeholder.com/330x267" alt="Portfolio-title" />
                                <div class="mask"></div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- portfolio item -->
                <div class="col-md-4 col-sm-6 grid-item art branding">
                    <a href="#gallery-1" class="gallery-link">
                        <div class="portfolio-item rounded shadow-dark">
                            <div class="details">
                                <span class="term">Art, Branding</span>
                                <h4 class="title">iMac Mockup Design</h4>
                                <span class="more-button"><i class="icon-picture"></i></span>
                            </div>
                            <div class="thumb">
                                <img src="https://via.placeholder.com/330x267" alt="Portfolio-title" />
                                <div class="mask"></div>
                            </div>
                        </div>
                    </a>
                    <div id="gallery-1" class="gallery mfp-hide">
                        <a href="https://via.placeholder.com/330x267"></a>
                        <a href="https://via.placeholder.com/330x267"></a>
                    </div>
                </div>

                <!-- portfolio item -->
                <div class="col-md-4 col-sm-6 grid-item creative design">
                    <a href="https://themeforest.net/user/pxlsolutions/portfolio" target="_blank">
                        <div class="portfolio-item rounded shadow-dark">
                            <div class="details">
                                <span class="term">Creative, Design</span>
                                <h4 class="title">Game Store App Concept</h4>
                                <span class="more-button"><i class="icon-link"></i></span>
                            </div>
                            <div class="thumb">
                                <img src="https://via.placeholder.com/330x267" alt="Portfolio-title" />
                                <div class="mask"></div>
                            </div>
                        </div>
                    </a>
                </div>

            </div>

            <!-- more button -->
            <div class="load-more text-center mt-4">
                <a href="javascript:" class="btn btn-default"><i class="fas fa-spinner"></i> Load more</a>
                <!-- numbered pagination (hidden for infinite scroll) -->
                <ul class="portfolio-pagination list-inline d-none">
                    <li class="list-inline-item">1</li>
                    <li class="list-inline-item"><a href="works-2.html">2</a></li>
                </ul>
            </div>

        </div>

    </section>

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
    <section id="testimonials">

        <div class="container">

            <!-- section title -->
            <h2 class="section-title wow fadeInUp">Clients & Reviews</h2>

            <div class="spacer" data-height="60"></div>

            <!-- testimonials wrapper -->
            <div class="testimonials-wrapper">

                <!-- testimonial item -->
                <div class="testimonial-item text-center mx-auto">
                    <div class="thumb mb-3 mx-auto">
                        <img src="https://via.placeholder.com/90x90" alt="customer-name" />
                    </div>
                    <h4 class="mt-3 mb-0">John Doe</h4>
                    <span class="subtitle">Product designer at Dribbble</span>
                    <div class="bg-white padding-30 shadow-dark rounded triangle-top position-relative mt-4">
                        <p class="mb-0">I enjoy working with the theme and learn so much. You guys make the process fun and
                            interesting. Good luck! 👍</p>
                    </div>
                </div>

                <!-- testimonial item -->
                <div class="testimonial-item text-center mx-auto">
                    <div class="thumb mb-3 mx-auto">
                        <img src="https://via.placeholder.com/90x90" alt="customer-name" />
                    </div>
                    <h4 class="mt-3 mb-0">John Doe</h4>
                    <span class="subtitle">Product designer at Dribbble</span>
                    <div class="bg-white padding-30 shadow-dark rounded triangle-top position-relative mt-4">
                        <p class="mb-0">I enjoy working with the theme and learn so much. You guys make the process fun and
                            interesting. Good luck! 🔥</p>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-3 col-6">
                    <!-- client item -->
                    <div class="client-item">
                        <div class="inner">
                            <img src="https://via.placeholder.com/100x30" alt="client-name" />
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <!-- client item -->
                    <div class="client-item">
                        <div class="inner">
                            <img src="https://via.placeholder.com/100x30" alt="client-name" />
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <!-- client item -->
                    <div class="client-item">
                        <div class="inner">
                            <img src="https://via.placeholder.com/100x30" alt="client-name" />
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <!-- client item -->
                    <div class="client-item">
                        <div class="inner">
                            <img src="https://via.placeholder.com/100x30" alt="client-name" />
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <!-- client item -->
                    <div class="client-item">
                        <div class="inner">
                            <img src="https://via.placeholder.com/100x30" alt="client-name" />
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <!-- client item -->
                    <div class="client-item">
                        <div class="inner">
                            <img src="https://via.placeholder.com/100x30" alt="client-name" />
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <!-- client item -->
                    <div class="client-item">
                        <div class="inner">
                            <img src="https://via.placeholder.com/100x30" alt="client-name" />
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <!-- client item -->
                    <div class="client-item">
                        <div class="inner">
                            <img src="https://via.placeholder.com/100x30" alt="client-name" />
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>

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

    <!-- section contact -->
    <section id="contact">

        <div class="container">

            <!-- section title -->
            <h2 class="section-title wow fadeInUp">Get In Touch</h2>

            <div class="spacer" data-height="60"></div>

            <div class="row">

                <div class="col-md-4">
                    <!-- contact info -->
                    <div class="contact-info">
                        <h3 class="wow fadeInUp">Let's talk about everything!</h3>
                        <p class="wow fadeInUp">Don't like forms? Send me an <a href="mailto:name@example.com">email</a>. 👋
                        </p>
                    </div>
                </div>

                <div class="col-md-8">
                    <!-- Contact Form -->
                    <form id="contact-form" class="contact-form mt-6" method="post" action="form/contact.php">

                        <div class="messages"></div>

                        <div class="row">
                            <div class="column col-md-6">
                                <!-- Name input -->
                                <div class="form-group">
                                    <input type="text" class="form-control" name="InputName" id="InputName"
                                        placeholder="Your name" required="required" data-error="Name is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="column col-md-6">
                                <!-- Email input -->
                                <div class="form-group">
                                    <input type="email" class="form-control" id="InputEmail" name="InputEmail"
                                        placeholder="Email address" required="required" data-error="Email is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="column col-md-12">
                                <!-- Email input -->
                                <div class="form-group">
                                    <input type="text" class="form-control" id="InputSubject" name="InputSubject"
                                        placeholder="Subject" required="required" data-error="Subject is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="column col-md-12">
                                <!-- Message textarea -->
                                <div class="form-group">
                                    <textarea name="InputMessage" id="InputMessage" class="form-control" rows="5"
                                        placeholder="Message" required="required"
                                        data-error="Message is required."></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" name="submit" id="submit" value="Submit" class="btn btn-default">Send
                            Message</button><!-- Send Button -->

                    </form>
                    <!-- Contact Form end -->
                </div>

            </div>

        </div>

    </section>
    <script src="{{ asset('js/http.js') }}"></script>
    <script>
        window.onload = function() {
            // loadExperience("");
        };
    </script>
    <div class="spacer" data-height="96"></div>

@endsection
