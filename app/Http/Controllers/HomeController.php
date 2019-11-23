<?php

namespace App\Http\Controllers;

use App\answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\question;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function getExam(Request $request){


        $semester = $request->input('semester');
        $getstatus = DB::table('question')->where('semid','=',$semester)->pluck('status');
        $getquestions = DB::table('question')->where('semid','=',$semester)->get();

        foreach ($getstatus as $g)
        if($g != 0 ){
            $getexam = DB::table('question')->where('status','=',1)->pluck('examid');
            $gethour = DB::table('exam')->where('id','=',$getexam)->pluck('hour');
            $getmin = DB::table('exam')->where('id','=',$getexam)->pluck('min');
            return view('exam')->with('getquestions',$getquestions)->with('gethour',$gethour)->with('getmin',$getmin);

        }
        else{
            echo '<script>alert("Exam will be started soon!!")</script>';
            return view('home');
        }

    }


        public function postanswer(Request $request){
            foreach ($request->input('qno') as $key => $k){


                $data = new answer();
                $data->uid = $request->uid;
                $data->question = $request->question[$key];
                $data->qno = $request->qno[$key];
                $data->mark = $request->marks[$key];
                $data->answer = $request->answer[$key];
                $data->save();

            }

            echo '<script>alert("Submitted Succsessfully");</script>';
            return view('submitanswer');
        }

}
