@extends('layouts.front')

@section('title')
    Category
@endsection

@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 style="font-size: 17px">All Categories</h2>
                    <div class="">
                        @foreach ($category as $cate)
                            <div  class="col-md-3 mb-3 text-center product-card">
                                <a href="{{ url('view-category/' . $cate->slug) }}">

                                         <img src="{{ asset('assets/uploads/category/' . $cate->image) }}"
                                            class="img-fluid w-100" style="object-fit: cover;height:200px"
                                            alt="Category image">
                                        <div class="mt-2">
                                            <h5 class="text-dark">{{ $cate->name }}</h5>
                                            <p class="text-dark">
                                                {{ $cate->decription }}
                                            </p>
                                        </div>
                                 </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
