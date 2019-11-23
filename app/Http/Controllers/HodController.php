<?php

namespace App\Http\Controllers;

use App\exam;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;

class HodController extends Controller
{
    public function index(){
        return view('HOD.index');
    }

    public function Addsubject(){
        return view('HOD.addsubject');
    }

    public function AddExam(){
        return view('HOD.addexam');
    }

    public function storesubject(Request $request){
               $addsubject =new subject();
               $addsubject->code = $request->sub_code;
               $addsubject->subname = $request->subname;
               $addsubject->semester_id = $request->semester;
               $addsubject->save();

               Session::flash('getmessage','Subject is Added');
               return Redirect::to('/hodpanel');
    }

    public function storexam(Request $request){
               $addexam = new exam();
               $addexam->examname = $request->examname;
               $addexam->totalmarks = $request->fullmarks;
               $addexam->hour = $request->hour;
               $addexam->min = $request->min;
               $addexam->save();

               Session::flash('exammessage','Exam is created');
               return Redirect::to('/hodpanel');
    }
}
