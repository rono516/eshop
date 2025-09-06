@extends('layouts.admin')
@section('content')
 <div class="">
     {{-- <div class="card-header">
        <h4>Product Page</h4>
        <hr>
     </div> --}}
     <div class="d-flex justify-content-between align-items-center">
        <div>
            <h4>Products</h4>
        </div>
      
        <div>
            {{-- <a href="">New Category</a> --}}
            <a href="{{ route('add.product') }}" class="btn btn-primary">New Product</a>
        </div>
     </div>
     <hr>
     <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Category</th>
                        <th>Name</th>
                        <th>Selling Price</th>
                        <th>Quantity</th>
                        <th>Image</th>
                        <th>Action</th>
                        <br>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $item)
                        
                       <tr>
                           <td>{{ $item->id}}  </td>
                           <td>{{ $item->category->name }}  </td>
                           <td>{{ $item->name}}  </td>
                           
                           <td>{{ $item->selling_price}}  </td>
                           <td>{{ $item->qty}}  </td>
                           <td>
                             <img src="{{ asset('assets/uploads/products/'.$item-> image)}}" class="cate-image" alt="image here"> </td>
                           <td>
                            <a href="{{ route('edit.product',$item->id)}}" class="btn btn-primary btn-sm">Edit</a>
                            {{-- <a href="{{ url('edit-product/'.$item-> id) }}" class="btn btn-primary btn-sm">Edit</a> --}}
                            <a href="{{ route('delete.product',$item->id) }}"  class="btn btn-danger btn-sm">Delete</a>
                            {{-- <a href="{{ url('delete-product/'.$item-> id) }}"  class="btn btn-danger btn-sm">Delete</a> --}}
                           </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
     </div>    
@endsection