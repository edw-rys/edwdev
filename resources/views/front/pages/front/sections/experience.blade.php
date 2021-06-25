<!-- section experience -->
<section id="experience">

    <div class="container">

        <!-- section title -->
        <h2 class="section-title wow fadeInUp">Experiencia</h2>

        <div class="spacer" data-height="60"></div>

        <div class="row">
            @foreach ($types_experience as $item)
                <div class="col-md-6">

                    <!-- timeline wrapper -->
                    <div class="timeline {{ $item->icon }} bg-white rounded shadow-dark padding-30 overflow-hidden">
                        @foreach ($item->experiences as $experience)
                            <!-- timeline item -->
                            <div class="timeline-container wow fadeInUp">
                                <div class="content">
                                    <span class="time">{{$experience->year_start}} - {{ $experience->year_end != 0 ? $experience->year_end : 'Presente' }}</span>
                                    <h3 class="title">{{$experience->name}}</h3>
                                    <p>{{ $experience->description }}</p>
                                </div>
                            </div>
                        @endforeach

                        <!-- main line -->
                        <span class="line"></span>

                    </div>

                </div>
                
            @endforeach

        </div>

    </div>

</section>