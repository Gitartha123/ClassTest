<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class Checkpaper extends Controller

{
    public function getsemester()
    {
        $sem = DB::table('semester')->pluck("semester","id");
        $posts =  DB::table('exam')->pluck("examname","id");
        return view('teacher.checkpaper',compact('sem'))->with('posts', $posts);
    }

    public function getsubject($id)
    {
        $subject = DB::table("subject")->where("semester_id",$id)->pluck("subname",'code');
        return json_encode($subject);
    }

    public function getValue(){
        $getvalue = Input::all();
        return view('teacher.candidate')->with('getValue',$getvalue);
    }
    //
}
