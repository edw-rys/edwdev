<section id="services">

    <div class="container">

        <!-- section title -->
        <h2 class="section-title wow fadeInUp">Servicios</h2>

        <div class="spacer" data-height="60"></div>

        <div class="row">
            @foreach ($services as $service)
                <div class="col-md-4">
                    <!-- service box -->
                    <div class="service-box rounded data-background padding-30 text-center text-light shadow-blue"
                        data-color="{{ $service->color }}">
                        <img src="{{ asset($service->image_url) }}" alt="{{ $service->name }}" />
                        <h3 class="mb-3 mt-0">{{ $service->name }}</h3>
                        <p class="mb-0">{{ $service->description }}
                        </p>
                    </div>
                    <div class="spacer d-md-none d-lg-none" data-height="30"></div>
                </div>                
            @endforeach
{{-- 
            <div class="col-md-4">
                <!-- service box -->
                <div class="service-box rounded data-background padding-30 text-center shadow-yellow"
                    data-color="#F9D74C">
                    <img src="https://via.placeholder.com/80x80" alt="UI/UX design" />
                    <h3 class="mb-3 mt-0">Web Development</h3>
                    <p class="mb-0">Lorem ipsum dolor sit amet consectetuer adipiscing elit aenean commodo ligula eget.
                    </p>
                </div>
                <div class="spacer d-md-none d-lg-none" data-height="30"></div>
            </div>

            <div class="col-md-4">
                <!-- service box -->
                <div class="service-box rounded data-background padding-30 text-center text-light shadow-pink"
                    data-color="#F97B8B">
                    <img src="https://via.placeholder.com/80x80" alt="UI/UX design" />
                    <h3 class="mb-3 mt-0">Photography</h3>
                    <p class="mb-0">Lorem ipsum dolor sit amet consectetuer adipiscing elit aenean commodo ligula eget.
                    </p>
                </div>
            </div> --}}

        </div>

        <div class="mt-5 text-center">
            <p class="mb-0">¿Buscas un trabajo personalizado? <a href="#contact">¡Da clic aqui </a> para contactarme! 👋</p>
        </div>

    </div>

</section>
