@extends('fontend.master')
@section('title','Contact | Lifestyle Blog') 
@section('content')
<div class="banner-1">

</div>
<div class="col-md-9 technology-left">
    <div class="contact-section">
        <h2 class="w3">CONTACT</h2>

        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <strong>{{session('msg')}}</strong> 
        </div>
        
        <script>
          $(".alert").alert();
        </script>
       
        
            <div class="contact-grids">
                <div class="col-md-8 contact-grid">
                    
                    <p>Nemo enim ips voluptatem voluptas sitsper natuaut odit aut fugit consequuntur magni dolores eosqratio nevoluptatem  amet eism com odictor ut ligulate cot ameti dapibu</p>
                <form action="{{route('message')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="name" placeholder="your Name " >

                        @error('name')
                        <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" placeholder=" your Email" >

                        @error('email')
                        <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <textarea type="text" name="message" placeholder="Special Instruction/Comments..." ></textarea>

                        @error('message')
                        <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                       
                       
                       
                        <input type="submit" value="Send">
                    </form>
                </div>
                <div class="col-md-4 contact-grid1">
                    <h4>Address</h4>
                    <div class="contact-top">
                        
                        
                        <div class="clearfix"></div>
                    </div>
                    <ul>
                            <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i> Office : 0041-456-3692</li>
                            <li><i class="glyphicon glyphicon-phone" aria-hidden="true"></i> Mobile : 01859487474</li>
                            <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i> <a href="#"></a><a href="mailto:info@example.com">info@example.com</a></li>
                            <li><i class="glyphicon glyphicon-print" aria-hidden="true"></i> Fax : 0091-789-456100</li>
                        </ul>

                </div>
                <div class="clearfix"></div>
            </div>
            <div class="google-map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d424145.8679554096!2d150.65178930803913!3d-33.847403996396665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b129838f39a743f%3A0x3017d681632a850!2sSydney+NSW%2C+Australia!5e0!3m2!1sen!2sin!4v1470643502584" allowfullscreen></iframe>
            </div>
        
    </div>
</div>
@endsection