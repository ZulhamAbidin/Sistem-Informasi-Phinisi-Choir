{{-- <div class="main-content mt-0">
    <div class="side-app">
        <div class="main-container">

            <style>
                .carousel-item {
                    position: relative !important;
                }

                .overlay {
                    position: absolute !important;
                    top: 0 !important;
                    left: 0 !important;
                    width: 100% !important;
                    height: 100% !important;
                    background-color: rgba(0, 0, 0, 0.5) !important;
                }

                .carousel-caption {
                    position: absolute !important;
                    top: 50% !important;
                    left: 50% !important;
                    transform: translate(-50%, -50%) !important;
                    text-align: center !important;
                    width: 80% !important;
                    max-width: 900px;
                    padding: 20px;
                    color: white !important;
                }

                .boki {
                    font-size: 3vw !important;
                    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif !important;
                    margin-bottom: 10px !important;
                }

                .carousel-caption {
                    width: 80% !important;
                    display: block !important;
                }

                .boki-2 {
                    font-size: 2vw !important;
                    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif !important;
                    margin-bottom: 10px !important;
                }
            </style>

            <div id="carousel-captions2" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($carousels as $carousel)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <img class="d-block w-100 br-5" alt=""
                            src="{{ asset('storage/uploads/' . $carousel->image_path) }}"
                            data-bs-holder-rendered="true">
                        <div class="overlay"></div>
                        <div class="carousel-caption">
                            <h3 class="boki">{{ $carousel->title }}.</h3>
                            <p class="boki-2">{{ $carousel->description }}.</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carousel-captions2" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel-captions2" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>    
</div> --}}


<style>
    .carousel-item {
        position: relative !important;
    }

    .overlay {
        position: absolute !important;
        top: 0 !important;
        left: 0 !important;
        width: 100% !important;
        height: 100% !important;
        background-color: rgba(0, 0, 0, 0.5) !important;
    }

    .carousel-caption {
        position: absolute !important;
        top: 50% !important;
        left: 50% !important;
        transform: translate(-50%, -50%) !important;
        text-align: center !important;
        width: 80% !important;
        max-width: 900px;
        padding: 20px;
        color: white !important;
    }

    /* .boki {
    font-size: 3vw !important;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif !important;
    margin-bottom: 10px !important;
    }

    .boki-2 {
    font-size: 2vw !important;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif !important;
    margin-bottom: 10px !important;
    } */
</style>

<div class="flex items-center">
        <div x-init="$nextTick(()=>$el._x_swiper = new Swiper($el, {scrollbar: {el: '.swiper-scrollbar',draggable: true}, navigation: {prevEl: '.swiper-button-prev',nextEl: '.swiper-button-next'},autoplay: {delay: 2000}}))"
            class="swiper xrounded-lg">
            <div class="swiper-wrapper">
                @foreach ($carousels as $carousel)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }} swiper-slide">
                    <img class="h-full w-full object-cover" src="{{ asset('storage/uploads/' . $carousel->image_path) }}" alt="" />
                    <div class="overlay"></div>
                    <div class="carousel-caption">
                        <h3 class="text-xl font-medium  lg:text-2xl">{{ $carousel->title }}</h3>
                        <p class="text-xl font-medium  lg:text-2xl">{{ $carousel->description }}.</p>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="swiper-scrollbar"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>