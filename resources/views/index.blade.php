<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regisiana</title>
    <link rel="stylesheet" type="text/css" href="{{asset('../components/dist/css/adminx.css')}}" media="screen" />
    
    <style>
        .div_image{
            /* margin-top: 20px; */
            padding: 20px 20px 20px 20px;
            /* box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); */
            /* text-align: center; */
        }
        .upper_image{
            width: 100%;
            // padding: 20px 20px 20px 20px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
        .polaroid {
  /* width: 100%; */
  /* box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); */
  padding: 20px 20px 20px 20px;
}

.container {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  padding: 10px;
  background-color: white;
}
    </style>
</head>
<body>
    <div class="adminx-container">
        @include('includes.navbar')

<div class="main">

<div class="div_image">
<img class="upper_image" src="{{asset('../UniversityImage/campus.jpg')}}" class="img-fluid" alt="...">
</div>

<!-- <div class="polaroid">
  
  <div class="container">
    <p>Hardanger, Norway</p>
  </div>
</div> -->

<div style="padding: 20px;">
<div class="card" >
  <div class="card-header">
    Exhibition
  </div>
  <div class="card-body">
    <h5 class="card-title">Project and Thesis Exhibition</h5>
    <p class="card-text">Here you can see the published project and thesis details and please give the review, Thanks in advance.</p>
    <a href="/exhibition" class="btn btn-primary">Lets Go</a>
  </div>
</div>
</div>

<div style="padding: 20px;">
<div class="card">
  <div class="card-header">
    Dashboard
  </div>
  <div class="card-body">
    <h5 class="card-title">Go to your dashboard</h5>
    <p class="card-text">Here you can go to dashboard by signing in.</p>
    <a href="/User_Login" class="btn btn-primary">Sign In</a>
  </div>
</div>
</div>

<div style="padding: 20px;">
<div class="card">
  <div class="card-header">
    Registration
  </div>
  <div class="card-body">
    <h5 class="card-title">Register yourself</h5>
    <p class="card-text">Here you can register as supervisor and student.</p>
    <a href="/supervisor_register"><small>Register as a supervisor</small></a>
            &nbsp;
            <a href="/student_register"><small>Register as a student</small></a>
    <!-- <a href="/User_Login" class="btn btn-primary">Sign In</a> -->
  </div>
</div>
</div>

</div>

    </div>
</body>
</html>