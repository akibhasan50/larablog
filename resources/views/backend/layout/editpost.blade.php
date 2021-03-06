@extends('backend.layout.master')


@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h2 class="m-0 font-weight-bold text-primary text-center">Edit Post</h2>
              <a href="{{route('post.index')}}" class="btn btn-sm btn-outline-info">All Post</a>

            </div>
            <div class="card-body">
            <form method="POST" action="{{route('post.update',$posts->id)}}" enctype="multipart/form-data">
              @csrf
              @method('PUT')
                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" class="form-control" name="title" id="exampleInputEmail1" 
                value="{{$posts->title}}">

                    @error('title')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="">Description</label>
                  <textarea class="form-control" name="description" id="" rows="5">{{$posts->description}}</textarea>

                  @error('description')
                  <strong class="text-danger">{{$message}}</strong>
                  @enderror
                </div>
               
               <div class="form-group">
                 <label for="">Image</label><br>
                 <img src="{{url($posts->image)}}" alt="post-img" style="width: 60px;height:50px;">
                 <input type="file" class="form-control" name="image" id=""  aria-describedby="fileHelpId">
                 <input type="hidden" name="oldimg" value="{{$posts->image}}">
               </div>
               <div class="form-group">
                <label for="">Category</label>
                <select class="form-control" name="category" id="">
                  <option>select category</option>
                  @foreach ($category as $item)
                  <option value="{{$item->id}}"
                    @if ($item->id == $posts->category_id)
                        selected
                    @endif
                    
                    >
                    
                    {{$item->name}}
                
                </option>
                  @endforeach
                  
                 
                </select>

                @error('category')
                <strong class="text-danger">{{$message}}</strong>
                @enderror
              </div>
             

                <button type="submit" class="btn btn-primary">Update</button>
              </form>
            </div>
          </div>
        
    </div>
</div>

@endsection