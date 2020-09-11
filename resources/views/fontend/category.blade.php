@extends('fontend.master')
@section('title','Categories | Lifestyle Blog')  
@section('content')
<!-- technology-left -->
<div class="technology">
    <div class="container">
        <div class="col-md-9 technology-left">
        <div class="tech-no">
            <!-- technology-top -->
            
             
            <div class="clearfix"></div>

            @foreach ($postcat as $post)
            
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
          
          
    
            </div>
        </div> 

@endsection