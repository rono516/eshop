<div class="d-flex gap-3 bg-dark py-4">
    <div class="ms-4 d-none d-md-block bg-light">
        <div class=" ">
            <div class="container">
                <div class="row">
                    <h2 class="text-dark" style="font-size: 16px">Trending Categories</h2>

                    <div class="">
                        @foreach ($trending_category as $tcategory)
                            <div class="">
                                <a href="{{ url('view-category/' . $tcategory->slug) }}">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <img src="{{ $tcategory->logo }}" class="img-fluid"
                                                style="object-fit: contain; height:20px; width:30px; border-radius:50%;"
                                                alt="Product image">
                                        </div>
                                        <div class="ms-2"> <!-- margin start for spacing -->
                                            <h5 class="text-dark mb-0 fs-6">{{ $tcategory->name }}</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach

                    </div>


                </div>
            </div>
        </div>
    </div>
    <div class="w-100">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button class="btn-primary" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('assets/images/slider.jpg') }}" class="d-block img-fluid w-100"
                        style="object-fit: contain;height:300px" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets/images/casual.jpg') }}" class="d-block img-fluid w-100"
                        style="object-fit: contain;height:300px" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets/images/leather.jpg') }}" class="d-block img-fluid w-100"
                        style="object-fit: contain;height:300px" alt="...">
                </div>
            </div>
            {{-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button> --}}
        </div>
    </div>


</div>
