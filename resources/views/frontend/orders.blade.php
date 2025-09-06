@extends('layouts.front')

@section('title')
    My Orders
@endsection

@section('content')
    <div class="container mt-5">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <h6>My Orders | <a href="{{ url('/') }}">HomePage</a></h6>
                    <hr>
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
                            @foreach ($user_orders as $uOrder)

                                <tr >

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

                    <p>Number of orders | {{ $user_orders->count() }}</p>



                </div>
            </div>
        </div>
    </div>
@endsection
