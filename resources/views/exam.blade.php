<?php session_start(); ?>
@extends('layout/master')
@section('body')
    <script language ="javascript" >

        var tim;
        var sec = 10;

       /* function f1() {

            f2();
             document.getElementById("starttime").innerHTML = "<h3Your started your Exam at</h1> " + f.getHours() + ":" + f.getMinutes();*/



        function f2(min) {
            var time = document.getElementById('hour').value*60;
            var min2 = document.getElementById('min').value;
            var min = parseInt(time)+parseInt(min2);
            if (parseInt(sec) > 0) {

                sec = parseInt(sec) - 1;
                document.getElementById("showtime").innerHTML = "<h3><b class='a1-red ' > Time Left :"+min+" :" + sec+" min</b></h3>";
                tim = setTimeout("f2()", 1000);
            }
            else {
                if (parseInt(sec) == 0) {
                    min = parseInt(min) - 1;
                    if (parseInt(min) == 0) {
                        clearTimeout(tim);
                        location.href = "default5.aspx";
                    }
                    else {
                        sec = 60;
                        document.getElementById("showtime").innerHTML = "Your Left Time  is :" + min + " Minutes ," + sec + " Seconds";
                        tim = setTimeout("f2()", 1000);
                    }
                }

            }
        }
    </script>
    <body onload="f2()">
    <div class=" a1-margin a1-container a1-light-gray" >
        @include('layouts.app')

        <form method="post" action="{{route('submitexam')}}">
            {{ csrf_field() }}
            @foreach($gethour as $h)
            <input type="text" value="{{$h}}" id="hour" style="display: none">
            @endforeach
            @foreach($getmin as $m)
            <input type="text" value="{{$m}}" id="min" style="display: none">
            @endforeach
            <input type="text" name="uid" value="{{ Auth::user()->id }}">
            <div id="starttime"></div><br />
            <div id="endtime"></div><br />
            <div id="showtime"></div>
            @foreach($getquestions as $gq)
                <table>
                    <tr>
                        <td width="40px;"><h3><b> {{$gq->qno}}.</b></h3></td>
                        <td width="60%"><h3><b>{{$gq->qtitle}}</b></h3></td>
                        <td width="100px"><h3>Marks:<input type="text" name="marks[]" class="form-control a1-right" value="{{$gq->mark}}" readonly></h3></td>
                        <input class="text" value="{{$gq->qno}}" name="qno[]" style="display: none;">
                        <input class="text" value="{{$gq->qtitle}}" name="question[]" style="display: none;">

                    </tr>
                    <p>
                </table>
                <fieldset id="{{$gq->qno}}" class="a1-margin">

                    <textarea  placeholder="Write your answer" class="form-control a1-input " name="answer[]" style=" width: 100%; height: 500px; font-size: 20px;"> </textarea>

                </fieldset>

            @endforeach

            {!! Form::submit('SUBMIT',['class'=>"a1-round a1-right a1-button-red a1-hover-red a1-button a1-block a1-section a1-light-gray a1-ripple a1-padding",'style'=>'width:100px;']) !!}
        </form>

    </div>
    </body>
@endsection




