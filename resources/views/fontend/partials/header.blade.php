<div class="header" id="ban">
    <div class="container">
        <div class="head-left wow fadeInLeft animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInLeft;">
            <div class="header-search">
                    <div class="search">
                        <input class="search_box" type="checkbox" id="search_box">
                        <label class="icon-search" for="search_box"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></label>
                        <div class="search_form ">
                        <form action="{{route('search')}}" method="GET">
                                <input type="text" name="search" placeholder="Search...">
                                <input type="submit" value="Send">
                            </form>
                        </div>
                    </div>
            </div>
        </div>
        <div class="header_right wow fadeInLeft animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInLeft;">
        <nav class="navbar navbar-default">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                <nav class="link-effect-7" id="link-effect-7">
                    <ul class="nav navbar-nav">
                    <li class="active act"><a href="{{'/'}}">Home</a></li>
                        
                        @foreach ($showcat as $item)
                    <li><a href="{{url('/category',$item->id)}}">{{$item->name}}</a></li>
                        @endforeach
                        <li><a href="{{url('/about')}}">About</a></li>      
                        <li><a href="{{url('/contact')}}">Contact</a></>
                    </ul>
                </nav>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
        </div>
        <div class="nav navbar-nav navbar-right social-icons wow fadeInRight animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInRight;">
                <ul>
                    <li><a href="https://facebook.com/"> </a></li>
                    <li><a href="https://pinterest.com/" class="pin"> </a></li>
                    <li><a href="https://linkedin.com/" class="in"> </a></li>
                    <li><a href="#" class="be"> </a></li>
                    
                </ul>
            </div>
        <div class="clearfix"> </div>	
    </div>
</div>

<div class="header-bottom">
    <div class="container">
        <div class="logo wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">
            <h1><a href="{{url('/')}}">LIFESTYLE BLOG</a></h1>
            <p><label class="of"></label>LET'S MAKE A PERFECT STYLE<label class="on"></label></p>
        </div>
    </div>
</div>