 <!-- section works -->
 <section id="works">

    <div class="container">

        <!-- section title -->
        <h2 class="section-title wow fadeInUp">Trabajos Recientes</h2>

        <div class="spacer" data-height="60"></div>

        <!-- portfolio filter (desktop) -->
        <ul class="portfolio-filter list-inline wow fadeInUp">
            <li class="current list-inline-item" data-filter="*">Todos</li>
            @foreach ($type_works as $item)
                <li class="list-inline-item" data-filter=".{{ $item->system_name }}">{{ $item->name }}</li>
            @endforeach
            {{-- <li class="list-inline-item" data-filter=".art">Art</li> --}}
            {{-- <li class="list-inline-item" data-filter=".design">Design</li> --}}
            {{-- <li class="list-inline-item" data-filter=".branding">Branding</li> --}}
        </ul>

        <!-- portfolio filter (mobile) -->
        <div class="pf-filter-wrapper">
            <select class="portfolio-filter-mobile">
                <option value="*">Everything</option>
                @foreach ($type_works as $item)
                    <option value=".{{ $item->system_name}}">{{ $item->name}}</option>
                @endforeach
                {{-- <option value=".art">Art</option> --}}
                {{-- <option value=".design">Design</option> --}}
                {{-- <option value=".branding">Branding</option> --}}
            </select>
        </div>

        <!-- portolio wrapper -->
        <div class="row portfolio-wrapper">
            @foreach ($works as $work)
                <!-- portfolio item -->
                <div class="col-md-4 col-sm-6 grid-item creative {{$work->type->system_name}}">
                    <a href="#small-dialog-{{$work->id}}" class="work-content">
                        <div class="portfolio-item rounded shadow-dark">
                            <div class="details">
                                <span class="term">{{ $work->type != null ? $work->type->name : ''}}</span>
                                <h4 class="title">{{ $work->name }}</h4>
                                <span class="more-button"><i class="icon-options"></i></span>
                            </div>
                            <div class="thumb">
                                {{-- 330x267 --}}
                                <img src="{{ $work->thumbnail_url }}" alt="{{ $work->name }}" />
                                <div class="mask"></div>
                            </div>
                        </div>
                    </a>
                    <div id="small-dialog-{{$work->id}}" class="white-popup zoom-anim-dialog mfp-hide">
                        <img src="{{ $work->file_url }}" alt="{{ $work->name }}" />
                        <h2>{{ $work->name }}</h2>
                        <p>{!! $work->description !!}</p>
                        @if ($work->external_link)
                            <a target="_blank" href="{{ $work->external_link }}" class="btn btn-default">Visitar</a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <!-- more button -->
        @if ($works->hasPages())
            <div class="load-more text-center mt-4">
                <a href="javascript:" class="btn btn-default"><i class="fas fa-spinner"></i> Leer más</a>
                <!-- numbered pagination (hidden for infinite scroll) -->
                <ul class="portfolio-pagination list-inline d-none">
                    @foreach ($works->links()->elements[0] as $page => $routeItem)
                        @if ($page == 1)
                            <li class="list-inline-item">1</li>
                        @else
                            <li class="list-inline-item"><a href="{{ route('front.works.list',['page'=> $page, 'take'=> count($works)]) }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                    {{-- @php
                        for ($i=2; $i <= $works_count ; $i++) { 
                            echo '<li class="list-inline-item"><a href="'. route('front.works.list',['page'=> $i, 'take'=> count($works)]) .'">2</a></li>';
                        }
                    @endphp --}}
                    {{-- <li class="list-inline-item"><a href="works-2.html">3</a></li> --}}
                </ul>
            </div>
        @endif
    </div>

</section>