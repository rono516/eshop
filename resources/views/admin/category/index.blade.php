@extends('layouts.admin')
@section('content')
    <div class="">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h4>Categories</h4>
            </div>

            <div>
                {{-- <a href="">New Category</a> --}}
                <a href="{{ route('add.category') }}" class="btn btn-primary">New Category</a>
            </div>
        </div>
        <hr>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                        <br>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $item)
                        <tr>
                            <td>{{ $item->id }} </td>
                            <td>{{ $item->name }} </td>
                            <td>{{ $item->decription }} </td>
                            <td>
                                <img src="{{ asset('storage/' . $item->image) }}" class="cate-image" alt="category">
                            <td>
                                {{-- <a href="{{ url('edit-category/'.$item-> id) }}" class="btn btn-primary">Edit</a> --}}
                                <a href="{{ route('edit.category', $item->id) }}" class="btn btn-primary">Edit</a>
                                {{-- <a href="{{ url('delete-category/'.$item-> id) }}"  class="btn btn-danger">Delete</a> --}}
                                <a href="{{ route('delete.category', $item->id) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
