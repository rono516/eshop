@extends('layouts.admin')
@section('content')
 <div class="card">
     <div class="card-header">
        <h4>Add Category</h4>
     </div>
        <div class="card-body">
            <form action="{{ route('new.category') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" class="form-control" name="slug">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="decription">Description</label>
                        <textarea name="decription" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="logo">Logo link</label>
                        <input type="text" class="form-control" name="logo">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" name="status">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Popular</label>
                        <input type="checkbox" name="popular">
                    </div>
                    {{-- <div class="col-md-6 mb-3">
                        <label for="">Meta title</label>
                        <input type="text" class="form-control" name="meta_title">
                    </div> --}}
                    {{-- <div class="col-md-6 mb-3">
                        <label for="">Meta Keywords</label>
                        <textarea name="meta_keywords" rows="3" class="form-control" ></textarea>
                    </div> --}}
                    {{-- <div class="col-md-6 mb-3">
                        <label for="">Meta Decription</label>
                        <textarea  name="meta_description" rows="3" class="form-control"></textarea>
                    </div> --}}
                    <div class="col-mid-12">
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary ">Submit</button>
                    </div>


                </div>
            </form>
        </div>
     </div>
@endsection
