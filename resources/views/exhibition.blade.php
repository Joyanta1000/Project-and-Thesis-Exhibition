<!DOCTYPE html>
<html>
<head>
   
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

#moreText {
  
            /* Display nothing for the element */
            display: none;
        }

body {
  background-color: #f1f1f1;
  padding: 20px;
  font-family: Arial;
}

/* Center website */
.main {
  max-width: 1000px;
  margin: auto;
}

h1 {
  font-size: 50px;
  word-break: break-all;
}

.row {
  margin: 10px -16px;
}

/* Add padding BETWEEN each column */
.row,
.row > .column {
  padding: 8px;
}

/* Create three equal columns that floats next to each other */
.column {
  float: left;
  width: 33.33%;
  display: none; /* Hide all elements by default */
}

/* Clear floats after rows */ 
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Content */
.content {
  background-color: white;
  padding: 10px;
}

/* The "show" class is added to the filtered elements */
.show {
  display: block;
}

/* Style the buttons */
.btn {
  border: none;
  outline: none;
  padding: 12px 16px;
  background-color: white;
  cursor: pointer;
}

.btn:hover {
  background-color: #ddd;
}

.btn.active {
  background-color: #666;
  color: white;
}
</style>
<link rel="stylesheet" type="text/css" href="{{asset('../components/dist/css/adminx.css')}}" media="screen" />
 <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> -->
</head>
<body>
<div class="adminx-container">
@include('includes.navbar')

<!-- MAIN (Center website) -->
<div class="main">



<h1>Project And Thesis Exhibition</h1>
<hr>

<h2>Gallery</h2>
<br>
<div id="myBtnContainer">
  <button class="btn active" onclick="filterSelection('all')"> Show all</button>
  <button class="btn" onclick="filterSelection('project')"> Project</button>
  <button class="btn" onclick="filterSelection('thesis')"> Thesis</button>
  <!-- <button class="btn" onclick="filterSelection('people')"> People</button> -->
</div>

<!-- Portfolio Gallery Grid -->
<div class="row">
  @foreach ($Project_or_Thesis as $PT)
  @if ($PT->category_id==1)
  <div class="column project">
    <div class="content">
      <!-- <img src="/w3images/mountains.jpg" alt="Mountains" style="width:100%"> -->
      <h4>{{$PT->name}}</h4>
      <p>{{ \Illuminate\Support\Str::limit($PT->description, 20, $end='...') }}
</p>
<a href="project_or_thesis_details_for_exhibition/{{$PT->id}}" class="btn btn-primary"> Show More </a>
    </div>
  </div>
  @elseif ($PT->category_id==2)
  <!-- <div class="column project">
    <div class="content">
    <img src="/w3images/lights.jpg" alt="Lights" style="width:100%">
      <h4>Lights</h4>
      <p>Lorem ipsum dolor..</p>
    </div>
  </div> -->
  <!-- <div class="column project">
    <div class="content">
    <img src="/w3images/nature.jpg" alt="Nature" style="width:100%">
      <h4>Forest</h4>
      <p>Lorem ipsum dolor..</p>
    </div>
  </div> -->
  
  <div class="column thesis">
    <div class="content">
      <!-- <img src="/w3images/cars1.jpg" alt="Car" style="width:100%"> -->
      <h4>{{$PT->name}}</h4>
      <p>{{ \Illuminate\Support\Str::limit($PT->description, 20, $end='...') }}
</p>
<a href="project_or_thesis_details_for_exhibition/{{$PT->id}}" class="btn btn-primary"> Show More </a>
    </div>
  </div>
  @else
  <div class="alert alert-danger">No Items</div>
  @endif
  @endforeach

  
  <!-- <div class="column thesis">
    <div class="content">
    <img src="/w3images/cars2.jpg" alt="Car" style="width:100%">
      <h4>Fast</h4>
      <p>Lorem ipsum dolor..</p>
    </div>
  </div> -->
  <!-- <div class="column thesis">
    <div class="content">
    <img src="/w3images/cars3.jpg" alt="Car" style="width:100%">
      <h4>Classic</h4>
      <p>Lorem ipsum dolor..</p>
    </div>
  </div> -->

  <!-- <div class="column people">
    <div class="content">
      <img src="/w3images/people1.jpg" alt="Car" style="width:100%">
      <h4>Girl</h4>
      <p>Lorem ipsum dolor..</p>
    </div>
  </div>
  <div class="column people">
    <div class="content">
    <img src="/w3images/people2.jpg" alt="Car" style="width:100%">
      <h4>Man</h4>
      <p>Lorem ipsum dolor..</p>
    </div>
  </div>
  <div class="column people">
    <div class="content">
    <img src="/w3images/people3.jpg" alt="Car" style="width:100%">
      <h4>Woman</h4>
      <p>Lorem ipsum dolor..</p>
    </div>
  </div> -->
<!-- END GRID -->
</div>

<div class="d-flex justify-content-center">
    {!! $Project_or_Thesis->links() !!}
</div>
<!-- END MAIN -->
</div>

<script>
filterSelection("all")
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("column");
  if (c == "all") c = "";
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
  }
}

function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);     
    }
  }
  element.className = arr1.join(" ");
}


// Add active class to the current button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}


// 



// 


</script>
</div>
</body>
</html>
