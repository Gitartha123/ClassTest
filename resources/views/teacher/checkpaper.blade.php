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
    <div class="a1-row a1-center a1-red a1-margin"><b><h3>CHECK PAPER</h3></b></div>
    <div class="a1-container a1-padding-4 a1-margin " >
        <table class="a1-table" >
            <form method="post" action="{{ route('check') }}">
                {{ csrf_field() }}
                <tr>
                    <td >
                        {!! Form::label('examselect','Select Examination:') !!}
                    </td>
                    <td>
                        <select  name="exam" id="exam" class="form-control" style="width:100%">
                            <option>--Select Examination--</option>
                            @foreach ($posts as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        {!! Form::label('Semester','Select Semester:') !!}
                    </td>
                    <td>
                        <select name="semester" class="form-control " style="width:100%">
                            <option value="">--Select Semester--</option>
                            @foreach ($sem as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="subject" >Select Subject:</label>
                    </td>
                    <td>
                        <select name="subject" class="form-control" style="width:100%" id="sub_select" onChange="copyValue()" id="selectsubject">
                            <option>--Select Subject--</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        {!! Form::label('subcode','Subject Code') !!}
                    </td>
                    <td>
                        <input type="text" name="sub_code" id="sub_code" class="form-control" style="width: 100%" readonly="true">
                    </td>
                </tr>
                <tr>
                    <td>
                        &nbsp;
                    </td>
                    <td>
                        {!! Form::submit('NEXT',['class'=>"a1-round a1-right a1-hover-red a1-button a1-block a1-section a1-light-gray a1-ripple a1-padding",'style'=>'width:100px;']) !!}
                    </td>
                </tr>
            </form>
        </table>
    </div>
</div>
</body>
</html>

<!--Dependent dropdown list-->
<script type="text/javascript">
    jQuery(document).ready(function ()
    {
        jQuery('select[name="semester"]').on('change',function(){
            var semesterID = jQuery(this).val();
            if(semesterID)
            {
                jQuery.ajax({
                    url : 'dropdownlist/getsubject/' +semesterID,
                    type : "GET",
                    dataType : "json",
                    success:function(data)
                    {
                        console.log(data);
                        jQuery('select[name="subject"]').empty();
                        jQuery.each(data, function(key,value){
                            $('select[name="subject"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
            }
            else
            {
                $('select[name="subject"]').empty();
            }
        });
    });
</script>





