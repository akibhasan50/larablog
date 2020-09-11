<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="{{asset('ui/backend')}}/img/logo/logo.png" rel="icon">
  <title>RuangAdmin - Register</title>
  <link href="{{asset('ui/backend')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="{{asset('ui/backend')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="{{asset('ui/backend')}}/css/ruang-admin.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-login">
  <!-- Register Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Register</h1>
                  </div>
                <form action="{{route('registration')}}" method="post">
                @csrf
                  <div class="form-group">
                    <label for="">name</label>
                    <input type="text"
                      class="form-control" value="{{old('name')}}"  name="name" id="" aria-describedby="helpId" placeholder="">
                      @error('name')
                      <strong class="text-danger">{{$message}}</strong>
                      @enderror
                  </div>
                  <div class="form-group">
                    <label for="">email</label>
                    <input type="text"
                      class="form-control" value="{{old('email')}}" name="email" id="" aria-describedby="helpId" placeholder="">
                     @error('email')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="">password</label>
                    <input type="text"
                      class="form-control" name="password" id="" aria-describedby="helpId" placeholder="">
                     @error('password')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror
                  </div>
                
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </form>
                  <hr>
                  <div class="text-center">
                  <a class="font-weight-bold small" href="{{url('admin/login/')}}">Already have an account?</a>
                  </div>
                  <div class="text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Register Content -->
  <script src="{{asset('ui/backend')}}/vendor/jquery/jquery.min.js"></script>
  <script src="{{asset('ui/backend')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{asset('ui/backend')}}/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="{{asset('ui/backend')}}/js/ruang-admin.min.js"></script>
</body>

</html>