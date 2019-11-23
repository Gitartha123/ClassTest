<?php session_start(); ?>
@extends('layout/master')
@section('body')
    <body >
    <div class=" a1-margin a1-container a1-light-gray" >
        @include('layouts.app')

        <div class="a1-container a1-border a1-round a1-red a1-padding-12" >
            <div class="a1-card a1-margin a1-padding a1-light-gray a1-center" style="height: 100px;">
                <h4><b>Thank You !! You may log out</b></h4>
            </div>
        </div>

    </div>
    </body>
@endsection




