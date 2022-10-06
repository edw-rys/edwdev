@extends('front.includes.template')
@section('section')
    <!-- section home -->
    @include('front.pages.front.sections.map',[
    ])

    <script src="{{ asset('js/http.js') }}"></script>
    <script>
        window.onload = function() {
            // loadExperience("");
        };
    </script>
    <div class="spacer" data-height="96"></div>

@endsection
{{-- https://developers.google.com/chart/interactive/docs/gallery/geochart --}}