<div class="main-content mt-0">
    <div class="side-app">
        <!-- CONTAINER -->
        <div class="main-container">
            <div id="carousel-captions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($carousels as $carousel)
                        <div class="carousel-item{{ $loop->first ? ' active' : '' }}">
                            <img class="d-block h-50 br-5" alt=""
                                src="{{ asset('storage/uploads/' . $carousel->image_path) }}"
                                data-bs-holder-rendered="true">
                            <div class="carousel-item-background"></div>
                            <div class="">
                                <h1 class="my-title items-center justify-content-center">{{ $carousel->title }}
                                    <br> {{ $carousel->description }}
                                </h1>
                                {{-- <p class="my-description">{{ $carousel->description }}</p> --}}
                            </div>
                        </div>
                    @endforeach
                </div>

                <a class="carousel-control-prev" href="#carousel-captions" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>

                <a class="carousel-control-next" href="#carousel-captions" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" ariahidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</div>
