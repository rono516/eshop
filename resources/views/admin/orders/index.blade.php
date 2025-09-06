@extends('layouts.admin')
@section('content')
    <div class="">
        {{-- <div class="card-header">
        <h4>Product Page</h4>
        <hr>
     </div> --}}
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h4>Orders</h4>
            </div>

            <div>
                {{-- <a href="">New Category</a> --}}
                <a href="{{ route('add.product') }}" class="btn btn-primary">New Product</a>
            </div>
        </div>
        <hr>
        <div class="card-body">
            {{-- <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Category</th>
                        <th>Name</th>
                        
                        
                        <th>Selling Price</th>
                        <th>Image</th>
                        <th>Action</th>
                        <br>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $item)
                        
                       <tr>
                           <td>{{ $item-> id}}  </td>
                           <td>{{ $item-> category->name }}  </td>
                           <td>{{ $item-> name}}  </td>
                           
                           <td>{{ $item-> selling_price}}  </td>
                           <td>
                             <img src="{{ asset('assets/uploads/products/'.$item-> image)}}" class="cate-image" alt="image here"> </td>
                           <td>
                            <a href="{{ route('edit.product',$item->id)}}" class="btn btn-primary btn-sm">Edit</a>
                             <a href="{{ route('delete.product',$item->id) }}"  class="btn btn-danger btn-sm">Delete</a>
                            </td>
                    </tr>
                    @endforeach
                </tbody>
            </table> --}}
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Delivery Address</th>
                        <th>Status</th>
                        <th>Tracking number</th>
                        <th>Amount</th>
                        <th>Order date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $uOrder)
                        <tr>

                            <td> <a href="{{ url('view_order', $uOrder->id) }}"> {{ $uOrder->id }}</a></td>
                            <td><a href="{{ url('view_order', $uOrder->id) }}"> {{ $uOrder->address1 }}</a> </td>
                            <td> <a href="{{ url('view_order', $uOrder->id) }}">
                                    {{ $uOrder->status == '0' ? 'Pending' : 'Delivered' }}</a></td>
                            <td><a href="{{ url('view_order', $uOrder->id) }}">{{ $uOrder->tracking_no }}</a></td>
                            <td><a href="{{ url('view_order', $uOrder->id) }}">{{ $uOrder->orderAmount() }}</a></td>
                            <td><a
                                    href="{{ url('view_order', $uOrder->id) }}">{{ date_format($uOrder->created_at, 'Y/m/d H:i:s') }}</a>
                            </td>



                        </tr>
                    @endforeach

                </tbody>
            </table>
            <hr>

            <p>Number of orders | {{ $orders->count() }}</p>
        </div>
    </div>
@endsection
