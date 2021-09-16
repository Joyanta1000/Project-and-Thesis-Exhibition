
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>AdminX - SignIn</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="{{asset('../components/dist/css/adminx.css')}}" media="screen" />
  </head>
  <body>
    <div class="adminx-container d-flex justify-content-center align-items-center">
      <div class="page-login">
        <div class="text-center">
          <a class="navbar-brand mb-4 h1" href="login.html">
            <img style="height: 100px; width: 100px;" src="{{asset('../UniversityImage/regis.svg')}}" class="navbar-brand-image d-inline-block align-top mr-2" alt="">
            <!-- Universitas Regisiana -->
          </a>
        </div>

        <div class="card mb-0">
          <!-- <div class="card-body">
            <a class="btn btn-labeled btn-block text-left btn-sm btn-facebook" href="#">
              <span class="btn-label">
                <i data-feather="facebook"></i>
              </span>
              Login with Facebook
            </a>
            <a class="btn btn-labeled btn-block text-left btn-sm btn-twitter" href="#">
              <span class="btn-label">
                <i data-feather="twitter"></i>
              </span>
              Login with Twitter
            </a>
          </div> -->
          <!-- <div class="card-seperator">
            <span>or</span>
          </div> -->

<div>
  @if (session('status'))
<br>
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert">×</button>
  {{ session('status') }}
</div>
@elseif(session('failed'))
<br>
<div class="alert alert-danger" role="alert">
  <button type="button" class="close" data-dismiss="alert">×</button>
  {{ session('failed') }}
</div>
@endif

@if (count($errors) > 0)
<br>
         <div class = "alert alert-danger">
            <ul>
               @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
@endif
</div>

          <div class="card-body">
            <form action="/login" method="post">
              <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
              
              <div class="form-group">
                <label for="exampleDropdownFormEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="exampleDropdownFormEmail1" placeholder="email@example.com">
              </div>
              
              <div class="form-group">
                <label for="exampleDropdownFormPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleDropdownFormPassword1" name="password" placeholder="Password">
              </div>

              <!-- <div class="form-group">
              <a href="/supervisor_register"><small>Register as a supervisor</small></a>
              <br>
              <a href="/student_register"><small>Register as a student</small></a>
              </div> -->

              <div class="form-group">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="customCheck1">
                  <label class="custom-control-label" for="customCheck1">Remember me</label>
                </div>
              </div>
              <button type="submit" name="submit" class="btn btn-sm btn-block btn-primary">Sign In</button>
            </form>
          </div>
          <div class="card-footer text-center">
            <!-- <a href="/supervisor_register"><small>Register as a supervisor</small></a>
            <br>
            <a href="/student_register"><small>Register as a student</small></a>
            <br> -->
            <a href="/reset"><small>Forgot your password?</small></a>
          </div>
        </div>
      </div>
    </div>

    <!-- If you prefer jQuery these are the required scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <script src="{{asset('../components/dist/js/vendor.js')}}"></script>
    <script src="{{asset('../components/dist/js/adminx.js')}}"></script>

    <!-- If you prefer vanilla JS these are the only required scripts -->
    <!-- script src="../dist/js/vendor.js"></script>
    <script src="../dist/js/adminx.vanilla.js"></script-->
  </body>
</html>