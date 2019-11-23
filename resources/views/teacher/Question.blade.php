<?php session_start(); ?>
<html>
<head>
    <title>Addpaper</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="{{asset('public/css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
</head>

<body>
<div class="a1-container a1-card a1-padding-4 a1-center " style="width: 60%; height:auto; overflow:hidden;margin: auto; ">
    @include('header')
    <form name="add_name" id="add_name" method="post" action="{{ route('q') }}">
    <div class="a1-row a1-center a1-border a1-light-gray a1-margin">
        <table class="a1-table a1-margin a1-padding a1-border a1-round a1-center" style="width: 60%">
        <tr class="a1-padding a1-margin-left ">
            @foreach ($exam as $e)
            <td> <b><h5 class="a1-right">Class Test :</h5></b></td>
            <td> <input type="text" value="{{$e}}" class="form-control a1-light-gray" name="examid"style="width:80px;"readonly></td>
            @endforeach
        </tr>
        <tr class="a1-padding a1-margin-right ">
            @foreach ($subject as $e)
                <td> <b><h5 class="a1-right">Subject code : </h5></b></td>
                <td>  <input type="text" value="{{$e}}" class="form-control a1-light-gray" name="subcode"style="width:80px;"readonly></td>
            @endforeach
        </tr>
        </table>
        <p>

            @foreach($semester as $e)<input type="text" value="{{$e}}" class="form-control a1-light-gray" name="semid"style="display:none;"readonly>@endforeach
        </p>

    </div>
    <div class="a1-container a1-padding-4 a1-margin " >

            <table>
                <tr>
                    <td>Total Marks:</td>
                    <td>
                        @foreach($totalmarks as $e)
                            <input type="text" value="{{$e->totalmarks}}" class="form-control a1-light-gray" name="totalmarks"style="width:80px;"readonly>
                        @endforeach
                    </td>
                </tr>
            </table>

            <p>

            <div class="table-responsive">

                <table class="table table-bordered" id="dynamic_field">
                    <tr>
                        <td>Qno:<input type="text" name="qno[]" value="1" class="form-control" style="width: 40px;" readonly> </td>
                        <td width="600px"><textarea name="name[]" placeholder="Enter Question" class="form-control name_list"></textarea> </td>
                        <td><input type="text" name="mark[]" class="form-control" placeholder="Enter mark" ></td>
                    </tr>

                </table>

            </div>
            {{ csrf_field() }}
            <table>
                <tr>
                    <td width="800px;">&nbsp;</td>
                    <td><button type="button" name="add" id="add" class="btn btn-success">Add more Question</button></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>{!! Form::submit('NEXT',['class'=>"a1-round a1-right a1-hover-red a1-button a1-block a1-section a1-light-gray a1-ripple a1-padding",'style'=>'width:100px;','id'=>'sub']) !!}</td>
                    <td>&nbsp;</td>
                </tr>
            </table>

    </div>
    </form>
</div>
</body>
</html>
<script>
    $(document).ready(function(){

        var i=1;
        $('#add').click(function(){
            i++;

            $('#dynamic_field').append('<tr id="row'+i+'"><td>Qno:<input type="text"class="form-control" value="'+i+'" name="qno[]" style="width: 40px;readonly"> </td><td><textarea name="name[]" placeholder="Enter Question" class="form-control name_list"></textarea></td><td><input type="text" class="form-control name_list" placeholder="Enter mark" name="mark[]"></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td> </tr>');
        });



        $(document).on('click', '.btn_remove', function(){
            var button_id = $(this).attr("id");
            $('#row'+button_id+'').remove();
            i--;

        });



        });

</script>







