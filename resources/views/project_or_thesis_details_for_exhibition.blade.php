<!DOCTYPE html>
<html lang="en">
  <head>
    <title>AdminX - Advanced Elements</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="stylesheet" type="text/css" href="{{asset('../components/dist/css/adminx.css')}}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{asset('../components/dist/css/adminx.css')}}" media="screen" />


    <!-- For rating -->
<!-- <link rel="stylesheet" type="text/css" href="{{asset('Rating/bootstrap/css/bootstrap.min.css')}}" /> -->
    <link rel="stylesheet" type="text/css" href="{{asset('Rating/font-awesome/css/font-awesome.min.css')}}" />

    <script type="text/javascript" src="{{asset('Rating/js/jquery-1.10.2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('Rating/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- For rating -->

    <style>
        .rating {
  --dir: right;
  --fill: gold;
  --fillbg: rgba(100, 100, 100, 0.15);
  --heart: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 21.328l-1.453-1.313q-2.484-2.25-3.609-3.328t-2.508-2.672-1.898-2.883-0.516-2.648q0-2.297 1.57-3.891t3.914-1.594q2.719 0 4.5 2.109 1.781-2.109 4.5-2.109 2.344 0 3.914 1.594t1.57 3.891q0 1.828-1.219 3.797t-2.648 3.422-4.664 4.359z"/></svg>');
  --star: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 17.25l-6.188 3.75 1.641-7.031-5.438-4.734 7.172-0.609 2.813-6.609 2.813 6.609 7.172 0.609-5.438 4.734 1.641 7.031z"/></svg>');
  --stars: 5;
  --starsize: 3rem;
  --symbol: var(--star);
  --value: 1;
  --w: calc(var(--stars) * var(--starsize));
  --x: calc(100% * (var(--value) / var(--stars)));
  block-size: var(--starsize);
  inline-size: var(--w);
  position: relative;
  touch-action: manipulation;
  -webkit-appearance: none;
}
[dir="rtl"] .rating {
  --dir: left;
}
.rating::-moz-range-track {
  background: linear-gradient(to var(--dir), var(--fill) 0 var(--x), var(--fillbg) 0 var(--x));
  block-size: 100%;
  mask: repeat left center/var(--starsize) var(--symbol);
}
.rating::-webkit-slider-runnable-track {
  background: linear-gradient(to var(--dir), var(--fill) 0 var(--x), var(--fillbg) 0 var(--x));
  block-size: 100%;
  mask: repeat left center/var(--starsize) var(--symbol);
  -webkit-mask: repeat left center/var(--starsize) var(--symbol);
}
.rating::-moz-range-thumb {
  height: var(--starsize);
  opacity: 0;
  width: var(--starsize);
}
.rating::-webkit-slider-thumb {
  height: var(--starsize);
  opacity: 0;
  width: var(--starsize);
  -webkit-appearance: none;
}
.rating, .rating-label {
  display: block;
  font-family: ui-sans-serif, system-ui, sans-serif;
}
.rating-label {
  margin-block-end: 1rem;
}

/* NO JS */
.rating--nojs::-moz-range-track {
  background: var(--fillbg);
}
.rating--nojs::-moz-range-progress {
  background: var(--fill);
  block-size: 100%;
  mask: repeat left center/var(--starsize) var(--star);
}
.rating--nojs::-webkit-slider-runnable-track {
  background: var(--fillbg);
}
.rating--nojs::-webkit-slider-thumb {
  background-color: var(--fill);
  box-shadow: calc(0rem - var(--w)) 0 0 var(--w) var(--fill);
  opacity: 1;
  width: 1px;
}
[dir="rtl"] .rating--nojs::-webkit-slider-thumb {
  box-shadow: var(--w) 0 0 var(--w) var(--fill);
}
    </style>
  </head>
  <body>
    <div class="adminx-container">
      <!-- Header -->
      @include('includes.navbar')
      <!-- // Header -->

      <!-- expand-hover push -->

      <!-- Main Content -->
      <div class="adminx-content">
        <div class="adminx-main-content">
          <div class="container-fluid">
            <!-- BreadCrumb -->
            <nav aria-label="breadcrumb" role="navigation">
              <ol class="breadcrumb adminx-page-breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Forms</a></li>
                <li class="breadcrumb-item active  aria-current="page">Advanced Elements</li>
              </ol>
            </nav>

            <div class="pb-3">
              <h1>Advanced Elements</h1>
            </div>

  
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


<!-- <form action="/insert_project_or_thesis" method="post" enctype="multipart/form-data">
@csrf -->
            <div class="row">
              <div class="col-lg-6">
                <div class="card mb-grid">
                  <div class="card-header">
                    <div class="card-header-title">Input Formats</div>
                  </div>
                  <div class="card-body">
                    <!-- <div class="form-group">
                      <label class="form-label">Credit Card</label>
                      <input class="form-control mb-2 input-credit-card" type="text" placeholder="Enter credit card number">
                    </div> -->
                    
                    <div class="form-group">
                      <label class="form-label">Name</label><br>
                      <span>{{$Project_or_Thesis[0]->name}}</span>
                      <!-- <input class="form-control mb-2" type="text" name="name" placeholder="Enter name"> -->
                    </div>

                    <!-- <div class="form-group">
                      <label class="form-label">Date</label>
                      <input class="form-control input-date mb-2" type="text" placeholder="YYYY/MM/DD">
                    </div>

                    <div class="form-group">
                      <label class="form-label">Numeral formatting</label>
                      <input class="form-control input-numeral mb-2" type="text" placeholder="Enter a large number">
                    </div> -->

                    <!-- <div class="form-group">
                      <label class="form-label">Prefix</label>
                      <input class="form-control input-prefix mb-2" type="text">
                    </div> -->
                    
                  </div>
                  <div class="card-footer">
                    Cleave.js is a small library for input formatting. Check out their <a href="http://nosir.github.io/cleave.js/" target="_blank">documentation</a>. <strong>Nice to know:</strong> There are also Angular and ReactJS components available.
                  </div>
                </div>

                <div class="card mb-grid">
                  <div class="card-header">
                    <div class="card-header-title">Advanced Select (Choices.js)</div>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label class="form-label">Type</label><br>
                      <span>{{$Project_or_Thesis[0]->typeName}}</span>
                    </div>

                    <div class="form-group">
                      <label class="form-label">Category</label><br>
                      <span>{{$Project_or_Thesis[0]->categoryName}}</span>
                    </div>

                    <div class="form-group">
                      <label class="form-label">Reference</label><br>
                      <span>{{$Project_or_Thesis[0]->reference}}</span>
                    </div>

                    <!-- <div class="form-group">
                      <label class="form-label">Multiple Select</label>
                      <select name="select" multiple class="form-control js-choice">
                        <option value="1">Sample value</option>
                        <option value="2" selected>Sample value 2</option>
                        <option value="3">Sample value 3</option>
                      </select>
                    </div> -->

                    <!-- <div class="form-group mb-0">
                      <label class="form-label">Multople Select With remove icon</label>
                      <select name="select" multiple class="form-control js-choice-remove">
                        <option value="1">Sample value</option>
                        <option value="2" selected>Sample value 2</option>
                        <option value="3">Sample value 3</option>
                      </select>
                    </div> -->
                  </div>
                  <div class="card-footer">
                    Choices.js is a fantastic library for custom selects with tons of options. Check out their <a href="https://joshuajohnson.co.uk/Choices/" target="_blank">documentation</a> for more options and examples.
                  </div>
                </div>

                <div class="card mb-grid">
                  <div class="card-header">
                    <div class="card-header-title">Advanced Select (Choices.js)</div>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label class="form-label">Assigned Students</label><br>
@foreach($Assigned_Students_Info as $key => $value)
                      <span>{{$value}}</span> <br>
@endforeach
                    </div>

                    <!--  -->
<hr>
                    <div class="form-group">
                      <label class="form-label">Assigned Supervisor</label><br>
@foreach($Assigned_Supervisors_Info as $key => $value)
                      <span>{{$value}}</span> <br>
@endforeach
                    </div>

                    <!--  -->

<hr>
                    <!-- Rating -->


                   
<!-- Rating - START -->
<div class="container" id="container1">
    <div class="col-md-4"></div>

    <div class="col-md-5">
        <div class="panel panel-default">
            
            <!-- <ul class="list-group list-group-flush text-center"> -->
                <!-- <li class="list-group-item">
                    <div class="skillLineDefault">
                        <div class="skill pull-left text-center">HTML5</div>
                        <div class="rating" id="rate1"></div>
                    </div>
                </li>
                <li class="list-group-item text-center">
                    <div class="skillLineDefault">
                        <div class="skill pull-left text-center">CSS</div>
                        <div class="rating" id="rate2"></div>
                    </div>
                </li> -->
                <!-- <li class="list-group-item text-center"> -->
                    <!-- <div class="skillLineDefault"> -->
                        
                        
                        <!-- <div class="rating"  ></div>
                        <input  id="rate3_value"/> -->
<div>

                        <input
                        id="rate3"
    class="rating"
    max="5"
    oninput="this.style.setProperty('--value', `${this.valueAsNumber}`)"
    step="0.1"
    style="--value:{{$Review}}"
    type="range"
    value="{{$Review}}">

    <input type="hidden" id= "project_id_rate3" value="{{$Project_or_Thesis[0]->id}}">


                    <!-- </div> -->
                <!-- </li> -->
                <!-- <li class="list-group-item text-center">
                    <div class="skillLineDefault">
                        <div class="skill pull-left text-center">C#</div>
                        <div class="rating" id="rate4"></div>
                    </div>
                </li> -->
            <!-- </ul> -->
            <br>
            <!-- <div class="panel-footer text-center"> -->
                <button type="button" onclick="myFunction()" class="btn btn-primary btn-lg btn-block">
                    Rate
                </button>
                    </div>
            <!-- </div> -->
        </div>
    </div>
</div>

<style>
    #container1 {
        margin-bottom: 120px;
        padding:20px;
        background-color:#f5f5f5;
    }

    .rating {
        margin-left: 30px;
    }

    div.skill {
        background: #5cb85c;
        border-radius: 3px;
        color: white;
        font-weight: bold;
        padding: 3px 4px;
        width: 70px;
    }

    .skillLine {
        display: inline-block;
        width: 100%;
        min-height: 90px;
        padding: 3px 4px;
    }

    skillLineDefault {
        padding: 3px 4px;
    }
</style>

<!-- you need to include the shieldui css and js assets in order for the charts to work -->
<link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light/all.min.css" />
<script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>

<script type="text/javascript">

 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

var mylist = "";
function myFunction() {
  rate = document.getElementById("rate3").value;

  project_id = document.getElementById("project_id_rate3").value;
  //var mylist2 = document.getElementById("rate3_value").value;
  console.log(rate);
  console.log(project_id);
  // alert('Rated Successfully');

  $.ajax({
           url:'/review',
           method:'POST',
           data:{
                  project_id:project_id, 
                  rate:rate
                },
           success:function(response){
              if(response){
                  alert("Rated Successfully") //Message come from controller
              }else{
                  alert("Error")
              }
           },
           error:function(error){
              console.log(error)
           }
        });

  //document.getElementById("rate3_value").value = mylist.options[mylist.selectedIndex].text;
}

    initializeRatings();

    function initializeRatings() {
        // $('#rate1').shieldRating({
        //     max: 7,
        //     step: 0.1,
        //     value: 6.3,
        //     markPreset: false
        // });
        // $('#rate2').shieldRating({
        //     max: 7,
        //     step: 0.1,
        //     value: 6,
        //     markPreset: false
        // });
        var rt = document.getElementById("rate3_value").value = 2;
        //console.log(rt);
        $('#rate3').shieldRating({
            //alert(mylist),
            max: 5,
            step: 1,
            value: mylist,
            markPreset: false,
            
        });
        // $('#rate4').shieldRating({
        //     max: 7,
        //     step: 0.1,
        //     value: 5,
        //     markPreset: false
        // });
    }
</script>

<!-- Rating - END -->



                    <!-- Rating -->

                    <!-- <div class="form-group">
                      <label class="form-label">Category</label><br>
                      <span>{{$Project_or_Thesis[0]->categoryName}}</span>
                    </div>

                    <div class="form-group">
                      <label class="form-label">Reference</label><br>
                      <span>{{$Project_or_Thesis[0]->reference}}</span>
                    </div> -->

                    <!-- <div class="form-group">
                      <label class="form-label">Multiple Select</label>
                      <select name="select" multiple class="form-control js-choice">
                        <option value="1">Sample value</option>
                        <option value="2" selected>Sample value 2</option>
                        <option value="3">Sample value 3</option>
                      </select>
                    </div> -->

                    <!-- <div class="form-group mb-0">
                      <label class="form-label">Multople Select With remove icon</label>
                      <select name="select" multiple class="form-control js-choice-remove">
                        <option value="1">Sample value</option>
                        <option value="2" selected>Sample value 2</option>
                        <option value="3">Sample value 3</option>
                      </select>
                    </div> -->
                  

                    <!-- <div class="form-group">
                      <label class="form-label">Category</label><br>
                      <span>{{$Project_or_Thesis[0]->categoryName}}</span>
                    </div>

                    <div class="form-group">
                      <label class="form-label">Reference</label><br>
                      <span>{{$Project_or_Thesis[0]->reference}}</span>
                    </div> -->

                    <!-- <div class="form-group">
                      <label class="form-label">Multiple Select</label>
                      <select name="select" multiple class="form-control js-choice">
                        <option value="1">Sample value</option>
                        <option value="2" selected>Sample value 2</option>
                        <option value="3">Sample value 3</option>
                      </select>
                    </div> -->

                    <!-- <div class="form-group mb-0">
                      <label class="form-label">Multople Select With remove icon</label>
                      <select name="select" multiple class="form-control js-choice-remove">
                        <option value="1">Sample value</option>
                        <option value="2" selected>Sample value 2</option>
                        <option value="3">Sample value 3</option>
                      </select>
                    </div> -->
                  </div>

                  

                  <div class="card-footer">
                    Choices.js is a fantastic library for custom selects with tons of options. Check out their <a href="https://joshuajohnson.co.uk/Choices/" target="_blank">documentation</a> for more options and examples.
                  </div>


                  


                </div>
              </div>

               <!-- <div class="card mb-grid">
                  <div class="card-header">
                    <div class="card-header-title">Advanced Select (Choices.js)</div>
                  </div>
                  <div class="card-body">
                   
                </div>
              </div> -->

              <div class="col-lg-6">
                <div class="card mb-grid">
                  <div class="card-header">
                    <div class="card-header-title">Date Picker</div>
                  </div>
                  <div class="card-body">


<!-- Assign Supervisor -->



<!-- Assign Supervisor -->
                    <!-- <div class="form-group">
                      <label class="form-label">Date Picker Default</label>
                      <input class="form-control mb-2 date-default" type="text" placeholder="Pick date">
                    </div> -->

                    <!-- <div class="form-group">
                      <label class="form-label">Date &amp; Time Picker</label>
                      <input class="form-control mb-2 date-time" type="text" placeholder="Pick date and time">
                    </div> -->

                    <!-- <div class="form-group">
                      <label class="form-label">Humand friendly date</label>
                      <input class="form-control date-human" type="text" placeholder="Pick date">
                      <small id="emailHelp" class="form-text text-muted mb-2">Recommended for better UX</small>
                    </div> -->

                    <!-- <div class="form-group">
                      <label class="form-label">Inline Calendar</label>
                      <input class="form-control mb-2 date-inline" type="text" placeholder="Pick date">
                    </div> -->
                    <!-- @if($Project_or_Thesis[0]->is_active == 0)
                    <div class="card mb-grid">
                <a type="submit" href= "/publish_by_student/{{$Project_or_Thesis[0]->id}}" name="submit" class="btn btn-primary">Publish</a>
                </div>
                @elseif($Project_or_Thesis[0]->is_active == 1)
                <div class="alert alert-success" role="alert">
                  Published
                    </div>
                    <a type="submit" href= "/unpublish_by_student/{{$Project_or_Thesis[0]->id}}" name="submit" class="btn btn-danger">Unpublish</a>
                @endif
                <hr> -->
                    <div class="form-group">
                      <label class="form-label">Description</label><br>
                      <span>{{$Project_or_Thesis[0]->description}}</span>
                    </div>

                    <div class="form-group">
                      <label class="form-label">Project or Thesis File</label><br>
                      @if (pathinfo($Project_or_Thesis[0]->file_url, PATHINFO_EXTENSION) == 'pdf')
                      <iframe src="{{$Project_or_Thesis[0]->file_url}}" width="100%" height="500px">
                      @elseif (pathinfo($Project_or_Thesis[0]->file_url, PATHINFO_EXTENSION) == 'docx' || pathinfo($photo->path, PATHINFO_EXTENSION) == 'doc')
                      <a href="{{$Project_or_Thesis[0]->file_url}}"><img src="https://img.icons8.com/color/48/000000/microsoft-word-2019--v2.png"/> &nbsp; Download</a>
                      @endif
                    </div>
                    
                  </div>
                  <div class="card-footer">
                    <a href="https://chmln.github.io/flatpickr/" target="_blank">Flatpickr</a> is a light-weight library for picking dates and times. It is feature rich and supports date ranges, disabling dates, multiple dates and many more.
                  </div>


                  <div class="form-group">
                      <label class="form-label">Assigned Supervisor</label><br>
@foreach($Assigned_Supervisors_Info as $key => $value)
                      <span>{{$value}}</span> <br>
@endforeach
                    </div>

                    <div class="form-group">

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

                      <form action="/assign_supervisor" method="post">
                      @csrf
                      <input type="hidden" name="project_id" value="{{$Project_or_Thesis[0]->id}}">
                      <label class="form-label">Assign Supervisor</label>
                      <select name="supervisor_id" class="form-control js-choice">
                      <option value="">Select</option>
                      @foreach($To_Assign_Supervisor as $key => $value)
                      <option value="{{$value->supervisor_id}}">{{$value->name}}</option>
                      @endforeach
                      </select>
                      <br>
                      <button type="submit" value="submit" class="btn btn-primary">Assign</button>
                    </form>
                    </div>

                    <!-- <div class="form-group">
                      <label class="form-label">Category</label><br>
                      <span>{{$Project_or_Thesis[0]->categoryName}}</span>
                    </div>

                    <div class="form-group">
                      <label class="form-label">Reference</label><br>
                      <span>{{$Project_or_Thesis[0]->reference}}</span>
                    </div> -->

                    <!-- <div class="form-group">
                      <label class="form-label">Multiple Select</label>
                      <select name="select" multiple class="form-control js-choice">
                        <option value="1">Sample value</option>
                        <option value="2" selected>Sample value 2</option>
                        <option value="3">Sample value 3</option>
                      </select>
                    </div> -->

                    <!-- <div class="form-group mb-0">
                      <label class="form-label">Multople Select With remove icon</label>
                      <select name="select" multiple class="form-control js-choice-remove">
                        <option value="1">Sample value</option>
                        <option value="2" selected>Sample value 2</option>
                        <option value="3">Sample value 3</option>
                      </select>
                    </div> -->
                  </div>
                  <div class="card-footer">
                    Choices.js is a fantastic library for custom selects with tons of options. Check out their <a href="https://joshuajohnson.co.uk/Choices/" target="_blank">documentation</a> for more options and examples.
                  </div>


                </div>
              </div>

              
              <div class="row">
              <div class="col-5">
                <div class="card mb-grid">
                  <div class="card-header">
                    <div class="card-header-title">Date Picker</div>
                  </div>
                  

                  <div class="form-group">
                      <label class="form-label">Assigned Supervisor</label><br>
@foreach($Assigned_Supervisors_Info as $key => $value)
                      <span>{{$value}}</span> <br>
@endforeach
                    </div>

                    <div class="form-group">

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

                      <form action="/assign_supervisor" method="post">
                      @csrf
                      <input type="hidden" name="project_id" value="{{$Project_or_Thesis[0]->id}}">
                      <label class="form-label">Assign Supervisor</label>
                      <select name="supervisor_id" class="form-control js-choice">
                      <option value="">Select</option>
                      @foreach($To_Assign_Supervisor as $key => $value)
                      <option value="{{$value->supervisor_id}}">{{$value->name}}</option>
                      @endforeach
                      </select>
                      <br>
                      <button type="submit" value="submit" class="btn btn-primary">Assign</button>
                    </form>





                    






                    </div>



                    <!-- Rating -->

                        

                    <!-- Rating -->

                    <!-- <div class="form-group">
                      <label class="form-label">Category</label><br>
                      <span>{{$Project_or_Thesis[0]->categoryName}}</span>
                    </div>

                    <div class="form-group">
                      <label class="form-label">Reference</label><br>
                      <span>{{$Project_or_Thesis[0]->reference}}</span>
                    </div> -->

                    <!-- <div class="form-group">
                      <label class="form-label">Multiple Select</label>
                      <select name="select" multiple class="form-control js-choice">
                        <option value="1">Sample value</option>
                        <option value="2" selected>Sample value 2</option>
                        <option value="3">Sample value 3</option>
                      </select>
                    </div> -->

                    <!-- <div class="form-group mb-0">
                      <label class="form-label">Multople Select With remove icon</label>
                      <select name="select" multiple class="form-control js-choice-remove">
                        <option value="1">Sample value</option>
                        <option value="2" selected>Sample value 2</option>
                        <option value="3">Sample value 3</option>
                      </select>
                    </div> -->
                  </div>
                  <div class="card-footer">
                    Choices.js is a fantastic library for custom selects with tons of options. Check out their <a href="https://joshuajohnson.co.uk/Choices/" target="_blank">documentation</a> for more options and examples.
                  </div>
                    </div>

                </div>
              </div>
            </div>

            


<!-- </form> -->
          </div>
        </div>
      </div>
      <!-- // Main Content -->
    </div>

    <!-- <div class="col-lg-6">
                <div class="card mb-grid">
                <button type="submit" name="submit" class="btn btn-primary">Add Items</button>
                </div>
              </div> -->

    <!-- If you prefer jQuery these are the required scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <script src="../components/dist/js/vendor.js"></script>
    <script src="../components/dist/js/adminx.js"></script>

    <!-- If you prefer vanilla JS these are the only required scripts -->
    <!-- script src="../dist/js/vendor.js"></script>
    <script src="../dist/js/adminx.vanilla.js"></script-->

    

    <script>
      var choices = new Choices('.js-choice');

      var choices2 = new Choices('.js-choice-remove', {
        removeItemButton: true,
      });

      var cleave = new Cleave('.input-credit-card', {
        creditCard: true,
        onCreditCardTypeChanged: function (type) {
          // update UI ...
        }
      });

      var cleave2 = new Cleave('.input-date', {
        date: true,
        datePattern: ['Y', 'm', 'd']
      });

      var cleave3 = new Cleave('.input-numeral', {
        numeral: true,
        numeralThousandsGroupStyle: 'thousand'
      });

      var cleave = new Cleave('.input-prefix', {
          prefix: 'INVOICE-',
          uppercase: true
      });

      flatpickr(".date-default", {
        allowInput: true
      });
      flatpickr(".date-time", {
        allowInput: true,
        enableTime: true,
      });
      flatpickr(".date-human", {
        allowInput: true,
        altInput: true,
      });
      flatpickr(".date-inline", {
        allowInput: true,
        inline: true,
      });
    </script>
  </body>
</html>