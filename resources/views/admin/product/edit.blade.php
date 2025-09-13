@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Update Product</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('update.product', $product->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <select class="form-select">
                            <option value="">{{ $product->category->name }}</option>


                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control" value="{{ $product->name }}" name="name">
                    </div>

                    {{-- <div class="col-md-12 mb-3">
                        <label for="">Small Description</label>
                        <textarea name="decription" rows="3"  class="form-control">{{ $product->small_description }} </textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Small Description</label>
                        <textarea name="small_description" rows="3" class="form-control">{{ old('small_description', $product->small_description) }}</textarea>
                    </div> --}}
                    <div class="col-md-12 mb-3">
                        <label for="">description</label>
                        <textarea name="description" rows="3" class="form-control">{{ old('description', $product->description) }} </textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Original Price</label>
                        <input type="number" value="{{ $product->original_price }}" name="original_price"
                            class="form-control">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Selling Price</label>
                        <input type="number" class="form-control" value="{{ $product->selling_price }}"
                            name="selling_price">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Tax</label>
                        <input type="number" value="{{ $product->tax }}" class="form-control" name="tax">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Quantity</label>
                        <input type="number" value="{{ $product->qty }}" class="form-control" name="qty">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" {{ $product->status == 1 ? 'checked' : '' }} name="status">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Trending</label>
                        <input type="checkbox" {{ $product->trending == 1 ? 'checked' : '' }} name="trending">
                    </div>

                    {{-- <div class="col-md-6 mb-3">
                        <label for="">Meta title</label>
                        <input type="text" value="{{ $product->meta_title }}" class="form-control" class="form-control"
                            name="meta_title">
                    </div> --}}
                    {{-- <div class="col-md-6 mb-3">
                        <label for="">Meta Keywords</label>
                        <textarea name="meta_keywords" rows="3" class="form-control">{{ $product->meta_keywords }}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Meta Description</label>
                        <textarea name="meta_description" rows="3" class="form-control">{{ $product->meta_description }}</textarea>
                    </div> --}}
                    @if ($product->image)
                        <p></p> {{-- {{  $product->image }} --}}
                        <img src="{{ asset('storage/' . $product->image) }}"
                            style="width: 150px;height:100px;margin-bottom:30px" alt="Product image">
                    @endif
                    <div class="col-mid-12">
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary ">Update</button>
                    </div>


                </div>
            </form>
        </div>
    </div>
@endsection
