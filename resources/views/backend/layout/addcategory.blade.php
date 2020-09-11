@extends('backend.layout.master')


@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h2 class="m-0 font-weight-bold text-primary text-center">Add New Category</h2>
              <a href="{{url('/admin/categories/')}}" class="btn btn-sm btn-outline-success">All Category</a>
            </div>
            <div class="card-body">
              <form method="POST" action="{{route('category.store')}}">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" name="name" class="form-control"
                    placeholder="Enter Category">

                    @error('name')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>
                
                
                
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
        
    </div>
</div>

@endsection