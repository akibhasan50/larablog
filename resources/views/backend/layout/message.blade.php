@extends('backend.layout.master')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">User Message Tables</h1>
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
        <li class="breadcrumb-item active" aria-current="page">Message Tables</li>
      </ol>
    </div>

    <div class="row">
      <div class="col-lg-12 mb-4">
        <!-- Simple Tables -->
        <div class="card">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">All Messages</h6>
          
          </div>
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th>ID</th>
                  <th>Name</th>               
                  <th>Email</th>
                  <th>Message</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @php
                      $i=0;
                  @endphp
              @foreach ($message as $item)
              @php
                      $i++;
                  @endphp
              <tr>
              <td><a href="#">{{$i}}</a></td>
                  <td> {{$item->name}}</td>
                  
                  <td> {{$item->email}}</td>
                  <td>{{ $item->message}}</td>
                 
                  <td class="d-flex">
                 
                  <a href="{{url('admin/message/reply',$item->id)}}" class="mx-2">
              
                      <button type="submit"   class="btn btn-sm btn-primary ">Reply</button>
                    
                    </a>
                  <a href="{{url('admin/message/delete',$item->id)}}">
              
                      <button type="submit"  onclick="return confirm('Are you sure to delete?')" class="btn btn-sm btn-danger ">Delete</button>
                    
                    </a>
                     
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