@foreach ($works as $work)
    <!-- portfolio item -->
    <div class="col-md-4 col-sm-6 grid-item creative {{ $work->type->system_name }}">
        <a href="#small-dialog-{{ $work->id }}" class="work-content">
            <div class="portfolio-item rounded shadow-dark">
                <div class="details">
                    <span class="term">{{ $work->type != null ? $work->type->name : '' }}</span>
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
        <div id="small-dialog-{{ $work->id }}" class="white-popup zoom-anim-dialog mfp-hide">
            <img src="{{ $work->file_url }}" alt="{{ $work->name }}" />
            <h2>{{ $work->name }}</h2>
            <p>{!! $work->description !!}</p>
            @if ($work->external_link)
                <a target="_blank" href="{{ $work->external_link }}" class="btn btn-default">Visitar</a>
            @endif
        </div>
    </div>
@endforeach
