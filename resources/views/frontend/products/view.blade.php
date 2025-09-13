 @extends('layouts.front')

 @section('title', $products->name)

 @section('content')

     <div style="background-color: #2e82a690" class="py-3 mb-4 shadow  border-top ">
         <div class="container">
             <h5 class="mb-0 text-dark">

                 <a class="text-dark" href="{{ url('view-category/' . $products->category->slug) }}">
                     {{ $products->category->name }}
                 </a>/
                 <a class="text-dark" href="{{ url('view-product', $products->id) }}">
                     {{ $products->name }}
                 </a> 
             </h5>
         </div>
     </div>

     <div class="container">
         <div class="card-shadow product_data">
             <div class="card-body">
                 <div class="row">
                     <div class="col-md-4 border-right">
                         <img src="{{ asset('storage/' . $products->image) }}" class="w-100" alt="">
                     </div>
                     <div class="col-md-8">
                         <h2 class="mb-2">
                             {{ $products->name }}
                             @if ($products->trending == '1')
                                 <label style="font-size:16px;"
                                     class="float-end badge bg-danger trending_tag">Trending</label>
                             @endif
                         </h2>
                         <hr>
                         <p class="fw-bold">Price: Ksh.{{ $products->selling_price }}</p>

                         <p class="mb-3"><s>Ksh.{{ $products->original_price }}</s></p>
                         <p class="mb-3"> Save: Ksh.{{ $products->original_price - $products->selling_price }} </p>
                         <p class="mt-3">
                             {{ $products->meta_description }}
                         </p>
                         <hr>
                         @if ($products->qty > 0)
                             <label class="badge bg-success">In stock</label>
                         @else
                             <label class="badge bg-danger">Out of Stock</label>
                         @endif
                         <div class="row mt-2">
                             <div class="col-md-3">
                                 <input type="hidden" value="{{ $products->id }}" class="prod_id">
                                 <label for="Quantity">Quantity</label>
                                 <div class="input-group text-center mb-3">
                                     <button class="input-group-text decrement-btn">-</button>
                                     <input type="text" name="quantity" class="form-control qty-input text-center"
                                         placeholder="1" value="1">
                                     <button class="input-group-text increment-btn">+</button>
                                 </div>
                             </div>
                             <div class="col-md-10">
                                 <br>
                                 @if ($products->qty > 0)
                                     <button type="button"
                                         class="btn  btn-primary mb-3 me-3 addToCartBtn float-start btn-sm">Add to Cart <i
                                             class="fa fa-shopping-cart"></i></button>
                                 @endif

                                 <button type="button" class="btn btn-success mb-3 float-start mr-1 btn-sm"
                                     style="margin-right: 5px;">Add to Wishlist <i class="fa fa-heart"></i></button>


                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>

 @endsection

 {{-- @push('js')
     <script>
         
     </script>
 @endpush --}}
