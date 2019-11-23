<?php session_start(); ?>
<html>
<head>
    <title>AddExam</title>
    <link rel="stylesheet" href="{{asset('public/css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <!--Selected value inserted to text box-->

</head>

<body>
<div class="a1-container a1-card a1-padding-4 a1-center " style="width: 60%; height:auto; overflow:hidden;margin: auto; ">
    @include('header')
    <div class="a1-row a1-center a1-red a1-margin"><b><h3>ADD EXAM</h3></b></div>
    <div class="a1-container a1-padding-4 a1-margin " >
        <table class="a1-table" >
            <form method="post" action="{{ route('postExamvalue') }}">
                {{ csrf_field() }}
                <tr>
                    <td>
                        {!! Form::label('Examname','Exam Name:') !!}
                    </td>
                    <td>
                        <input type="text" name="examname" id="examname" class="form-control" style="width: 100%" placeholder="Enter Exam Name: ">
                    </td>
                </tr>
                <tr>
                    <td>
                        {!! Form::label('Full Marks','Full Marks:') !!}
                    </td>
                    <td>
                        <input type="text" name="fullmarks" id="fullmarks" class="form-control" style="width: 100%"  placeholder="Enter Full Marks">
                    </td>
                </tr>

                <tr>
                    <td>
                        {!! Form::label('Time','Enter Time:') !!}
                    </td>
                    <td>
                        <div class="a1-row">
                            <div class="a1-quarter" style="width: 40px"><input type="text" name="hour" id="time" class="form-control" style="width:40px;"></div>
                            <div class="a1-quarter a1-padding" style="width: 40px">Hr:</div>
                            <div class="a1-quarter" style="width: 40px"><input type="text" name="min" id="time" class="form-control" style="width:40px;"></div>
                            <div class="a1-quarter a1-padding" style="width: 40px">Min</div>
                        </div>
                    </td>
                </tr>


                <tr>
                    <td>
                        &nbsp;
                    </td>
                    <td>
                        {!! Form::submit('SAVE',['class'=>"a1-round a1-right a1-hover-red a1-button a1-block a1-section a1-light-gray a1-ripple a1-padding",'style'=>'width:100px;']) !!}
                    </td>
                </tr>
            </form>
        </table>
    </div>
</div>
</body>
</html>




