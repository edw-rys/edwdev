@extends('front.includes.template')
@section('scripts_head')
    <style>
        /*Image modal*/

        .modal {
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgba(0, 0, 0, 0.733);
            margin-top: -1px;
            animation: zoom 0.3s ease-in-out;
        }

        @keyframes zoom {
            from {
                transform: scale(0);
            }

            to {
                transform: scale(1);
            }
        }

        .modal img {
            width: 80%;
            object-fit: cover;
        }

        .closeBtn {
            color: rgba(255, 255, 255, 0.87);
            font-size: 25px;
            position: absolute;
            top: 0;
            right: 0;
            margin: 20px;
            cursor: pointer;
            transition: 0.2s ease-in-out;
        }

        .closeBtn:hover {
            color: rgb(255, 255, 255);
        }

    </style>
@endsection
@section('section')
    <!-- section home -->

    <!-- section experience -->
    <section id="experience">

        <div class="container" id="lightgallery">

            <!-- section title -->
            <h1 class="text-center section-title wow fadeInUp">{{ $item->name }}</h1>

            <div class="spacer" data-height="60"></div>

            @foreach ($item->childs as $child)
                <div class="row mb-3">
                    <div class="col-md-3">
                        <div class="text-center text-md-left rounded card p-1">
                            <!-- avatar image -->
                            <h2 class="mt-4">{{ $child->title }}</h2>
                        </div>
                        <div class="spacer d-md-none d-lg-none" data-height="30" style="height: 30px;"></div>
                    </div>
                    <div class="col-md-9 triangle-left-md triangle-top-sm">
                        <div class="rounded bg-white shadow-dark padding-30 gallery__item"
                            data-src="{{ $child->file_url }}">
                            <img src="{{ $child->file_url }}" class="w-100" alt="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($child->items as $item)
                        <div class="col-md-6">
                            <!-- timeline wrapper -->
                            <div class="timeline exp bg-white rounded shadow-dark padding-30 overflow-hidden">
                                <!-- timeline item -->
                                <div class="timeline-container wow fadeInUp">
                                    <div class="content">
                                        {{-- <span class="time">{{$experience->year_start}} - {{ $experience->year_end != 0 ? $experience->year_end : 'Presente' }}</span> --}}
                                        <h3 class="title">{{ $item->title }}</h3>
                                        <p>{{ $item->description }}</p>
                                        @if ($item->image != null)
                                            <div
                                                class="gallery__item timeline work bg-white rounded shadow-dark padding-30 overflow-hidden">
                                                <img src="{{ $item->file_url }}" alt="{{ $item->name }}">
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <!-- main line -->
                                <span class="line"></span>
                            </div>

                        </div>
                    @endforeach

                </div>
            @endforeach

        </div>

    </section>

    <script src="{{ asset('js/http.js') }}"></script>
    <div class="spacer" data-height="96"></div>
@endsection
@section('scripts_body_after')
    <script>
        window.onload = function() {
            const images = document.querySelectorAll(".gallery__item img");
            let imgSrc;
            // get images src onclick
            images.forEach((img) => {
                img.addEventListener("click", (e) => {
                    imgSrc = e.target.src;
                    //run modal function
                    imgModal(imgSrc);
                });
            });
            //creating the modal
            let imgModal = (src) => {
                const modal = document.createElement("div");
                modal.setAttribute("class", "modal");
                //add the modal to the main section or the parent element
                document.querySelector(".main").append(modal);
                //adding image to modal
                const newImage = document.createElement("img");
                newImage.setAttribute("src", src);
                //creating the close button
                const closeBtn = document.createElement("i");
                closeBtn.setAttribute("class", "fas fa-times closeBtn");
                //close function
                closeBtn.onclick = () => {
                    modal.remove();
                };
                modal.append(newImage, closeBtn);
            };

        };
    </script>
@endsection
