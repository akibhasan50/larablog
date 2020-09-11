@extends('backend.layout.master')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Post Tables</h1>
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
        <li class="breadcrumb-item active" aria-current="page">post Tables</li>
      </ol>
    </div>

    <div class="row">
      <div class="col-lg-12 mb-4">
        <!-- Simple Tables -->
        <div class="card">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">All Posts</h6>
          <a href="{{route('post.create')}}" class="btn btn-sm btn-outline-info">Add Post</a>
          </div>
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th>ID</th>
                  <th>Title</th>               
                  <th>img</th>
                  <th>category</th>
                  <th>Authore</th>
                 
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                  @php
                      $i=0;
                  @endphp
                @foreach ($posts as $post)
                @php
                $i++;
            @endphp
                <tr>
                  <td><a href="#">{{$i}}</a></td>
                    <td>{{$post->title}}</td>
                    <td>
                      <img src="{{url($post->image)}}" alt="post-img" style="width: 60px;height:50px;">
                      {{-- {{$post->image}} --}}
                    </td>
                    <td>{{$post->category->name}}</td>
                    <td>{{$post->user->name}}</td>
                    @if (Auth::user()->id == $post->user->id)
                    <td class="d-flex">
                      <a href="{{route('post.edit',$post->id)}}" class="btn btn-sm btn-primary mx-2">Edit</a>
                      <form action="{{route('post.destroy',$post->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit"  onclick="return confirm('Are you sure to delete?')" class="btn btn-sm btn-danger ">Delete</button>
                      
                      </form>
                       
                      </td>
                    @endif
                   
                  </tr>
                @endforeach
               
                
        
              </tbody>
            </table>
            {!! $posts->links()!!}
          </div>
          <div class="card-footer"></div>
        </div>
      </div>
    </div>
    <!--Row-->



  </div>
@endsection