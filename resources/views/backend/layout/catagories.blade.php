@extends('backend.layout.master')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Category Tables</h1>
      @if (session('msg'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      <strong>{{session('msg')}}</strong> 
      </div>
      <script>
        $(".alert").alert();
      </script>
      @endif
     
      
      
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item">Tables</li>
        <li class="breadcrumb-item active" aria-current="page">Simple Tables</li>
      </ol>
    </div>

    <div class="row">
      <div class="col-lg-12 mb-4">
        <!-- Simple Tables -->
        <div class="card">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">All Category</h6>
          <a href="{{url('/admin/categories/add')}}" class="btn btn-sm btn-outline-info">Add Category</a>
          </div>
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th>Category ID</th>
                  <th>name</th>
                  <th>slug</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @php
                    $i=0;
                @endphp
                @foreach ($showcat as $item)
                @php
                $i++;
              @endphp
                <tr>
                  <td><a href="#">{{$i}}</a></td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->slug}}</td>
                    <td>
                      @if ($item->status == 1 )
                      <span class="badge badge-success">Active</span>
                       
                      @else
                      <span class="badge badge-danger">Dective</span>  
                      
                      @endif
                     
                    </td>
                    <td>
                    <a href="{{url('admin/categories/edit/'.$item->id)}}" class="btn btn-sm btn-primary">Edit</a>
                      <a href="{{url('admin/categories/delete/'.$item->id)}}" onclick="return confirm('Are you sure to delete?')" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                  </tr>
                @endforeach
               
           
              </tbody>
             
            </table>
           
          </div>
         
          <div class="card-footer"></div>
        </div>
      </div>
    </div>
    <!--Row-->

   

  </div>
@endsection