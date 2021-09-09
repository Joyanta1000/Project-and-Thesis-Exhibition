<!DOCTYPE html>
<html lang="en">
  <head>
    <title>AdminX - Advanced Elements</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="../components/dist/css/adminx.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../components/dist/css/adminx.css" media="screen" />
  </head>
  <body>
    <div class="adminx-container">
      <!-- Header -->
      @include('student.includes.navbar')
      <!-- // Header -->

      <!-- expand-hover push -->
      @include('student.includes.sidebar')

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

                      <form action="/assign_student" method="post">
                      @csrf
                      <input type="hidden" name="project_id" value="{{$Project_or_Thesis[0]->id}}">
                      <label class="form-label">Assign Student</label>
                      <select name="student_id" class="form-control js-choice">
                      <option value="">Select</option>
                      @foreach($To_Assign_Student as $key => $value)
                      <option value="{{$value->student_id}}">{{$value->name}}</option>
                      @endforeach
                      </select>
                      <br>
                      <button type="submit" value="submit" class="btn btn-primary">Assign</button>
                    </form>
                    </div>
<hr>
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

                    <div class="form-group">
                      <label class="form-label">Description</label><br>
                      <span>{{$Project_or_Thesis[0]->description}}</span>
                    </div>

                    <div class="form-group">
                      <label class="form-label">Project or Thesis File</label><br>
                      <iframe src="{{$Project_or_Thesis[0]->file_url}}" width="100%" height="500px">
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