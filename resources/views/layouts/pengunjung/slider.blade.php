
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
                        <span ></span>
                        <h3 class="text-sm md:text-md font-medium  lg:text-2xl">{{ $carousel->title }}</h3>
                        <p class="text-sm md:text-md lg:text-2xl">{{ $carousel->description }}.</p>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="swiper-scrollbar"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>