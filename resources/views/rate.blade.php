<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Rating Template | PrepBootstrap</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="Rating/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="Rating/font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="Rating/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="Rating/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

<div class="page-header">
    <h1>Rating <small>Bootsrap Rating template</small></h1>
</div>

<!-- Rating - START -->
<div class="container" id="container1">
    <div class="col-md-4"></div>

    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="text-center">Skills<span class="glyphicon glyphicon-saved pull-right"></span></h4>
            </div>
            <div class="panel-body text-center">
                <p class="lead">
                    <strong>Technology Overview</strong>
                </p>
            </div>
            <ul class="list-group list-group-flush text-center">
                <li class="list-group-item">
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
                </li>
                <li class="list-group-item text-center">
                    <div class="skillLineDefault">
                        <div class="skill pull-left text-center">jQuery</div>
                        <div class="rating" id="rate3"></div>
                        <input type="text" id="rate3_value" value=""/>
                    </div>
                </li>
                <li class="list-group-item text-center">
                    <div class="skillLineDefault">
                        <div class="skill pull-left text-center">C#</div>
                        <div class="rating" id="rate4"></div>
                    </div>
                </li>
            </ul>
            <div class="panel-footer text-center">
                <button type="button" class="btn btn-primary btn-lg btn-block">
                    Submit
                </button>
            </div>
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
    initializeRatings();

    function initializeRatings() {
        $('#rate1').shieldRating({
            max: 7,
            step: 0.1,
            value: 6.3,
            markPreset: false
        });
        $('#rate2').shieldRating({
            max: 7,
            step: 0.1,
            value: 6,
            markPreset: false
        });
        var rt = document.getElementById("rate3_value").value = 2;
        //console.log(rt);
        $('#rate3').shieldRating({
            max: 7,
            step: 0.1,
            value: rt,
            markPreset: false,
            
        });
        $('#rate4').shieldRating({
            max: 7,
            step: 0.1,
            value: 5,
            markPreset: false
        });
    }
</script>

<!-- Rating - END -->

</div>

</body>
</html>