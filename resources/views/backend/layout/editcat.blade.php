@extends('backend.layout.master')


@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h2 class="m-0 font-weight-bold text-primary text-center">Edit Category</h2>
              <a href="{{url('/admin/categories/')}}" class="btn btn-sm btn-outline-success">All Category</a>

            </div>
            <div class="card-body">
              <form method="POST" action="{{url('admin/categories/update/'.$cat->id)}}">
                @csrf
               
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" name="name" class="form-control"
                value="{{$cat->name}}">
                @error('name')
                <strong class="text-danger">{{$message}}</strong>
                @enderror
                </div>
                
               
                
                <div class="form-group">
                  <label for="">Status</label>
                  <select class="form-control" name="status" id="">
                    <option>select status</option>
                    <option @if ($cat->status == 1) selected @endif value="1">Active </option>
                    <option @if ($cat->status == 0) selected @endif value="0">Deactive</option>
                  </select>

                  @error('status')
                <strong class="text-danger">{{$message}}</strong>
                @enderror
                </div>
                
                <button type="submit" class="btn btn-primary">update</button>
              </form>
            </div>
          </div>
        
    </div>
</div>

@endsection