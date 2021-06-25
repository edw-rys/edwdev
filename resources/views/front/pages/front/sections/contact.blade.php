<!-- section contact -->
<section id="contact">

    <div class="container">

        <!-- section title -->
        <h2 class="section-title wow fadeInUp">Ponerse en contacto</h2>

        <div class="spacer" data-height="60"></div>

        <div class="row">

            <div class="col-md-4">
                <!-- contact info -->
                <div class="contact-info">
                    <h3 class="wow fadeInUp">¡Hablemos de todo!</h3>
                    <p class="wow fadeInUp">¿Deseas contactarme directamente? Envíame un <a href="mailto:edw-toni@hotmail.com">Correo</a>. 👋
                    </p>
                </div>
            </div>

            <div class="col-md-8">
                <!-- Contact Form -->
                <form id="contact-form" class="contact-form mt-6" method="post" action="{{ route('front.contact.send')}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token-form-contact">
                    <div class="messages"></div>

                    <div class="row">
                        <div class="column col-md-6">
                            <!-- Name input -->
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Su nombre" required="required" data-error="El nombre es Requerido.">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="column col-md-6">
                            <!-- Email input -->
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Dirección de Correo electrónico" required="required" data-error="Email es Requerido.">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="column col-md-12">
                            <!-- Email input -->
                            <div class="form-group">
                                <input type="text" class="form-control" id="subject" name="subject"
                                    placeholder="Asunto" required="required" data-error="El asunto es requerido.">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="column col-md-12">
                            <!-- Message textarea -->
                            <div class="form-group">
                                <textarea name="message" id="message" class="form-control" rows="5"
                                    placeholder="Mensaje" required="required"
                                    data-error="El mensaje es requerido."></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" name="submit" id="submit" value="Submit" class="btn btn-default">Enviar Mensaje</button><!-- Send Button -->

                </form>
                <!-- Contact Form end -->
            </div>

        </div>

    </div>

</section>