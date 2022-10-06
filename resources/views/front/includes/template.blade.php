<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>{{ config('app_project.title') }}</title>
    <meta name="description" content="{{ config('app_project.description') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('front/images/me/gafas.jpg') }}">

    <!-- STYLESHEETS -->
    <link rel="stylesheet" href="{{ asset_front('css/bootstrap.min.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset_front('css/all.min.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset_front('css/simple-line-icons.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset_front('css/slick.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset_front('css/animate.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset_front('css/magnific-popup.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset_front('css/style.css') }}" type="text/css" media="all">
    {{-- @notifyCss --}}
    @yield('links')
    @yield('scripts_head')
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="main">

    <!-- Preloader -->
    <div id="preloader">
        <div class="outer">
            <!-- Google Chrome -->
            <div class="infinityChrome">
                <div></div>
                <div></div>
                <div></div>
            </div>

            <!-- Safari and others -->
            <div class="infinity">
                <div>
                    <span></span>
                </div>
                <div>
                    <span></span>
                </div>
                <div>
                    <span></span>
                </div>
            </div>
            <!-- Stuff -->
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" class="goo-outer">
                <defs>
                    <filter id="goo">
                        <feGaussianBlur in="SourceGraphic" stdDeviation="6" result="blur" />
                        <feColorMatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo" />
                        <feBlend in="SourceGraphic" in2="goo" />
                    </filter>
                </defs>
            </svg>
        </div>
    </div>

    <!-- mobile header -->
    <header class="mobile-header-1">
        <div class="container">
            <!-- menu icon -->
            <div class="menu-icon d-inline-flex mr-4">
                <button>
                    <span></span>
                </button>
            </div>
            <!-- logo image -->
            <div class="site-logo">
                <a href="/">
                    <img src="{{ img_me() }}" alt="Edw" />
                </a>
            </div>
        </div>
    </header>

    @include('front.components.sidebar')

    <!-- main layout -->
    <main class="content">
		{{-- <img src="{{ asset('files/images/my/samoyed_icon.png') }}" alt="My samoyedo" class="my-samoyed-r-b"> --}}
        @yield('section')

    </main>
    {{-- @notifyJs --}}

    <!-- Go to top button -->
    <a href="javascript:" id="return-to-top"><i class="fas fa-arrow-up"></i></a>

    @yield('scripts_body_before')
    <!-- SCRIPTS -->
    <script src="{{ asset_front('js/jquery-1.12.3.min.js') }}"></script>
    <script src="{{ asset_front('js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset_front('js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset_front('js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset_front('js/popper.min.js') }}"></script>
    <script src="{{ asset_front('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset_front('js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset_front('js/infinite-scroll.min.js') }}"></script>
    <script src="{{ asset_front('js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset_front('js/slick.min.js') }}"></script>
    <script src="{{ asset_front('js/contact.js') }}"></script>
    <script src="{{ asset_front('js/validator.js') }}"></script>
    <script src="{{ asset_front('js/wow.min.js') }}"></script>
    <script src="{{ asset_front('js/morphext.min.js') }}"></script>
    <script src="{{ asset_front('js/parallax.min.js') }}"></script>
    <script src="{{ asset_front('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset_front('js/custom.js') }}?v=1.2"></script>
    @yield('scripts_body_after')
{{-- 
    @if ($visit_id != '-1')
        <script>
            $.ajax(
                {
                    method: 'GET',
                    url: '{{ route('front.set-visitit-api', $visit_id)}}',
                    data: {
                        // 'id': '{{ $visit_id }}'
                    }
                }
            )
            .done(function(response) {
            });
        
        </script>
        
    @endif --}}
</body>

</html>
