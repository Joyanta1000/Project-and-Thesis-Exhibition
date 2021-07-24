
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
            <img src="{{asset('../components/demo/img/logo.png')}}" class="navbar-brand-image d-inline-block align-top mr-2" alt="">
            AdminX
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
          <div class="card-seperator">
            
          </div>



          <div class="card-body">
            <div>
  
<br>
@if (!empty($status))
<br>
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert">×</button>
  {{ $status }}
</div>
@elseif(!empty($failed))
<br>
<div class="alert alert-danger" role="alert">
  <button type="button" class="close" data-dismiss="alert">×</button>
  {{ $failed }}
</div>
@endif

</div>
          </div>
          <div class="card-footer text-center">
            <a href="/User_Login"><small>Login</small></a> <br>
            <a href="#"><small>Forgot your password?</small></a>
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