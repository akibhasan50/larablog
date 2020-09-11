@extends('fontend.master')

@section('title',' LifeStyle Blog a Blogging Category For new generation')  

@section('content')

<!-- banner -->

<div class="banner">
<div class="container">	
    <h2>{{$banner->title}}</h2>
    <p>{{$banner->description, 200, '...'}}</p>
    <a href="{{url('/details',$banner->slug)}}">READ MORE</a>
</div>
</div>

<!-- technology-left -->
<div class="technology">
<div class="container">
    <div class="col-md-9 technology-left">
    <div class="tech-no">
        <!-- technology-top -->
        
         
        <div class="clearfix"></div>

        
        <!-- technology-top -->
       
        <!-- technology-top -->
        @foreach ($posts as $post)
        
        {{-- $post->url is converting id into slug --}}
        
        <div class="wthree">
            <div class="col-md-6 wthree-left wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">
               <div class="tch-img">
                       <a href="{{$post->url}}"><img src="{{url($post->image)}}" class="img-responsive" alt=""></a>
                   </div>
            </div>
            
            <div class="col-md-6 wthree-right wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">
                   <h3><a href="{{$post->url}}">{{$post->title}}</a></h3>
                   <h6>BY <a href="">{{$post->user->name}}</a> {{$post->create_date}}</h6>
               <p>{{Str::limit($post->description, 150, '...') }}</p>
                       <div class="text-danger">
                        <span class="badge badge-info">{{$post->category->name}}</span>
                      
                       </div>
                       <div class="bht1">
                       <a href="{{$post->url}}">Read More</a>
                       </div>
                       <div class="soci">
                           <ul>
                               
                               <li class="hvr-rectangle-out"><a class="twit" href="#"></a></li>
                               <li class="hvr-rectangle-out"><a class="pin" href="#"></a></li>
                           </ul>
                       </div>
                       <div class="clearfix"></div>
               
            </div>
               <div class="clearfix"></div>
       </div>
        @endforeach   
      
      {{$posts->links()}}

        </div>
    </div> 
@endsection