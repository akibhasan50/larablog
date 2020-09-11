<div class="col-md-3 technology-right">
				
				
    <div class="blo-top1">
                
        <div class="tech-btm">
        <div class="search-1 wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">
            <form action="{{route('search')}}" method="GET">
                    <input type="search" name="search" placeholder="search">
                    <input type="submit" value=" ">
                </form>
            </div>
        <h4>Popular Posts </h4>
        @foreach ($posts as $post)
        <div class="blog-grids wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">
            <div class="blog-grid-left">
                <a href="{{$post->url}}"><img src="{{url($post->image)}}" class="img-responsive" alt=""></a>
            </div>
            <div class="blog-grid-right">
                
                <h5><a href="{{$post->url}}">{{Str::limit($post->description, 30, '...') }}</a> </h5>
            </div>
            <div class="clearfix"> </div>
        </div>
        @endforeach
            
            
        <div class="insta wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">
                <h4>Category</h4><hr>
                <ul>
                    @foreach ($showcat as $item)
                    <li><a href="{{url('/category',$item->id)}}">{{$item->name}}</a></li><hr>
                    @endforeach
                
                </ul>
        </div>
        
        </div> 
    </div>
    

</div>