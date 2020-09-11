@extends('fontend.master')
@section('title','Post details |Lifestyle Blog')  
@section('content')
<div class="banner-1">

</div>
<div class="technology">
	
<div class="col-md-12 technology-left">
    <div class="agileinfo">

    <h2 class="w3">SINGLE PAGE</h2>
        <div class="single">
        <img src="{{url($singlepost->image)}}" class="img-responsive" alt="">
            <div class="b-bottom"> 
            <h5 class="top">{{$singlepost->title}}</h5>
            <p class="sub">{{$singlepost->description}}</p>
            <p>On {{$singlepost->create_date}} <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>{{$singlepost->comment->count()}} </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>56 </a></p>
            
            </div>
        </div>
      

                <div class="response">
                    <h4>Comments({{$singlepost->comment->count()}})</h4>

                     @if ($singlepost->comment->count() <= 0)
                    
                      <div class="bg-danger ">
                     
                        <p class="h1 text-dark">No comment yet Be the first</p>
                    </div>
                  
                @else
                @foreach ($singlepost->comment as $comment)
                <div class="media response-info">
                    
                    <div class="media-left response-text-left">
                        <a href="#">
                            <img src="{{asset('ui/fontend')}}/images/sin1.jpg" class="img-responsive" alt="">
                        </a>
                    </div>
                    <div class="media-body response-text-right">
                    <p>{{$comment->comment}}</p>
                        <ul>
                            <li>{{$comment->created_at->diffForHumans()}}</li>
                           
                        </ul>
                        
                    </div>
                    <div class="clearfix"> </div>
                   
                </div>
               @endforeach
                
                @endif

              
            
            
        </div>	
        <div class="coment-form">
            <h4>Leave your comment</h4>
        <form action="{{route('comment.store',$singlepost->id)}}" method="post">
                @csrf
                <input type="text" placeholder="Name " name="name" >
                <input type="email" placeholder="Email" name="email" >
             
                <textarea  type="text" placeholder="Your Comment..."  name="comment"></textarea>
                <input type="submit" value="Submit Comment">
            </form>
        </div>	
        <div class="clearfix"></div>
    </div>
</div>
</div>

@endsection