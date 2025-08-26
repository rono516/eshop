@extends('layouts.admin')
@section('content')
 <div class="card">
        <div class="card-body">
            <h3>Welcome to Amin Dashboard</h3>
            <h4>Name: {{auth()->user()->name}}</h4>
            <h4>Email: {{auth()->user()->email}}</h4>

            {{-- <h4>Product categories Category </h4> --}}
        </div>
     </div>
@endsection
