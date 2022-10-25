<section id="about">

    <div class="container">

        <!-- section title -->
        <h2 class="section-title wow fadeInUp">@lang('global.about.title')</h2>

        <div class="spacer" data-height="60"></div>

        <div class="row">

            <div class="col-md-3">
                <div class="text-center text-md-left">
                    <!-- avatar image -->
                    <img src="{{ img_me() }}" alt="" class="mb-4" style="height: 150px;"/>
                </div>
                <div class="spacer d-md-none d-lg-none" data-height="30"></div>
            </div>

            <div class="col-md-9 triangle-left-md triangle-top-sm">
                <div class="rounded bg-white shadow-dark padding-30">
                    <div class="row">
                        <div class="col-md-8 col-12 col-xs-6">
                            <!-- about text -->
                            <p>@lang($about)</p>
                            <div class="mt-3">
                                {{-- <a href="#" class="btn btn-default">Download CV</a> --}}
                            </div>
                            <div class="spacer d-md-none d-lg-none" data-height="30"></div>
                        </div>
                        <div class="col-md-4 col-12 col-xs-6">
                            <div class="row">
                                @foreach ($percentage_habilities as $item)
                                    <!-- skill item -->
                                    <div class="text-center skill-item col-4 col-md-6 col-xs-4">
                                        <img src="{{ asset($item->icon)}}" style="width: 60px;height: 60px;" alt="">
                                        <div class="skill-info clearfix">
                                            <h4 class="text-center mb-0 mt-0">{{ $item->name }}</h4>
                                        </div>
                                        <div class="progress mb-2">
                                            <div class="progress-bar data-background" role="progressbar" aria-valuemin="0"
                                                aria-valuemax="100" aria-valuenow="100" data-color="{{ $item->color }}">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- row end -->

        <div class="spacer" data-height="70"></div>

        <div class="row">
            @foreach ($more as $item)
                <div class="col-md-3 col-sm-6">
                    <!-- fact item -->
                    <div class="fact-item">
                        <span class="{{ $item->icon }}"></span>
                        <div class="details">
                            <h3 class="mb-0 mt-0 number"><em class="count">{{ $item->numbers }}</em></h3>
                            <p class="mb-0">{{ $item->name }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</section>
