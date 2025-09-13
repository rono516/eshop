@extends('layouts.front')

@section('title')
    Welcome to Mega E-shop
@endsection

@section('content')
    {{-- <div class="py-3 shadow bg-warning border-top">
         <div class="container">
             <h5 class="mb-0">
                 <a href="{{ url('category') }}">Collections</a>
                 /
                 <a href=" ">
                     Home
                 </a>/
               
             </h5>
         </div>
     </div> --}}
    @include('layouts.inc.slider')

    <div class="py-5">
        <div class="container">
            <div class="row">
                {{-- <h2>Featured Products</h2> --}}
                <div class="row">
                    @foreach ($featured_products as $prod)
                        <div class="col-6 col-md-4 col-lg-3 ">
                            <a href="{{ url('view-product', $prod->id) }}">
                                <div class=" product-card ">
                                    <img src="{{ asset('storage/' . $prod->image) }}"
                                        class="img-fluid w-100" style="object-fit: cover;height:200px"
                                        alt="{{ $prod->name }}">
                                    <div class="ps-2 text-dark">
                                        <h5 style="font-size: 13px;opacity:0.6" class="mb-1 mt-1">
                                            {{ $prod->category->name }}</h5>
                                        <h5 class="mb-1 mt-1">{{ $prod->name }}</h5>
                                        <div class="d-flex justify-content-between  pe-2 mb-2">
                                            <div> 
                                                <span class=" ">Ksh. <strong>{{ $prod->selling_price }}</strong></span>
                                            </div>
                                            <div>
                                                <span class=" "> <s>Ksh. {{ $prod->original_price }} </s></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>

            </div>
        </div>
    </div>
@endsection


