<?php session_start(); ?>
<html>
<head>
    <title>Deploy</title>
    <link rel="stylesheet" href="{{asset('public/css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <!--Selected value inserted to text box-->
    <script type="text/javascript">
        function copyValue()
        {
            var dropboxvalue = document.getElementById('sub_select').value;
            document.getElementById('sub_code').value = dropboxvalue;
        }
    </script>
</head>

<body>
<div class="a1-container a1-card a1-padding-4 a1-center " style="width: 60%; height:auto; overflow:hidden;margin: auto; ">
    @include('header')
    <div class="a1-row a1-center a1-red a1-margin"><b><h3>CANDIDATE LIST</h3></b></div>
    <div class="a1-container a1-padding-4 a1-margin " >

    </div>
</div>
</body>
</html>







