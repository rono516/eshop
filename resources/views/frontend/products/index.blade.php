@extends('layouts.front')

@section('title')
    {{ $category->name }}
@endsection

@section('content')
    {{-- <div style="background-color: #2e82a690" class="py-3 mb-4 shadow  border-top">
        <div class="container">
            <h5 class="mb-0"><a href="{{ route('categories') }}">{{ $category->name }}</a></h5>
        </div>
    </div> --}}

    <div class="py-5">
        <div class="container">
            <div class="row">
                {{-- <h2>{{ $category->name }}</h2> --}}


                @foreach ($products as $prod)
                    <div class="col-6 col-md-4 col-lg-3">

                        <div class="card">
                            {{-- <a href="{{ url('view-product/'.$prod->id) }}">

                        <img src="{{ asset('storage/'.$prod->image ) }}" width="250" height="250" alt="Product image">
                        <div class="card-body">
                             <h5 >{{ $prod->name }}</h5>
                            <span class="float-start">Ksh. {{ number_format( $prod->selling_price) }}</span>
                            <span class="float-end"> <s>Ksh.  {{number_format( $prod->original_price) }} </s></span>
                        </div>
                      </a> --}}
                            <a href="{{ url('view-product', $prod->id) }}">
                                <div class=" product-card  pb-2">
                                    <img src="{{ asset('storage/' . $prod->image) }}"
                                        class="img-fluid w-100 pt-2" style="object-fit: cover;height:200px"
                                        alt="{{ $prod->name }}">
                                    <div class="ps-2 text-dark">
                                        <h5 class="mb-1 mt-1">{{ $prod->name }}</h5>
                                        <div class="d-flex justify-content-between  pe-2">
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
                    </div>
                @endforeach



            </div>
        </div>
    </div>
@endsection
