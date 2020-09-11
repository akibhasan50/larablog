
<!DOCTYPE HTML>
<html>
<head>
<title>@yield('title')</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Style Blog Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="{{asset('ui/fontend')}}/css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
{{-- <link href='//fonts.googleapis.com/css?family=Raleway:400,600,700' rel='stylesheet' type='text/css'> --}}
{{-- <link href="{{asset('ui/fontend')}}/css/style.css" rel='stylesheet' type='text/css' /> --}}
<link rel="stylesheet" href="{{mix('ui/fontend/css/style.css')}}">	
{{-- <script src="{{asset('ui/fontend')}}/js/jquery-1.11.1.min.js"></script>
<script src="{{asset('ui/fontend')}}/js/bootstrap.min.js"></script> --}}
<!-- animation-effect -->
<link href="{{asset('ui/fontend')}}/css/animate.min.css" rel="stylesheet"> 
<script src="{{asset('ui/fontend')}}/js/wow.min.js"></script>
<script>
 new WOW().init();
</script>
<!-- //animation-effect -->
</head>
<body>
@include('fontend.partials.header')
	<!--start-main-->
@yield('content')
		<!-- technology-right -->
        @include('fontend.partials.sidebar')
		<div class="clearfix"></div>
		<!-- technology-right -->
	</div>
</div>
{{-- footer --}}

@include('fontend.partials.footer')
</body>
</html>