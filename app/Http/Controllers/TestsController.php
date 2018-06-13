<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booklate;
use App\Question;
use App\Exam;
use App\User;
use Auth;

class TestsController extends Controller
{
    // Authenticate User
    public function __construct()
    {   
        $this->middleware('auth');
    }

    /* Load Test index Page

    */
    public function index()
    {
        $booklates = Booklate::where('booklate_type',0)->get(); 
        return view('test.index')->with('booklates',$booklates);
    }

    //Load Question Paper

    public function getTest($id)
    {
        $booklates = Booklate::find($id);
        // return $questions;
        return view('test.test')->with('booklates',$booklates);
    }

    //get answers

    public function getAnswer(Request $request)
    {
        // dd($request);
        
        $key = array_keys($request['que']);
        $booklate = Booklate::find($request['qbid']);
        $correct = $booklate->correct_mark;
        $minus =  $booklate->minuse_mark;
        // return $booklate;
        $mark = 0;
        $correct_ans = 0;
        $incorrect = 0;
        foreach ($key as $k) {
            if(count(Question::where(['qusid'=>$k, 'ans'=>$request['que'][$k]])->get())==1 )
            {
                $mark += $correct;
                $correct_ans++;
            }
            else
            {
                $mark -= $minus;
                $incorrect++;
            }
            // $mark .= $k .' => '. $request['que'][$k] . '\r\n';
        }

        $exam = new Exam();
        $exam->qbid = $booklate->qbid;
        $exam->user_id = Auth::user()->id;
        $exam->total_correct = $correct_ans;
        $exam->total_incorrect = $incorrect;
        $exam->mark = $mark;
        $exam->ans_list = json_encode($request['que'], JSON_UNESCAPED_UNICODE );

        $exam->save();

        return redirect('/result/'.$exam->id);
    }

    //Show result
    public function showResult($id = null)
    {
        if($id){
            $result = Exam::find($id);
            if(!$result || $result->user_id != Auth::user()->id)
            {
                abort('404');
            }
        }else{
            $result = Exam::where('user_id',Auth::user()->id)->orderBy('id','decs')->first();
        }
        return view('test.result')->with('result',$result);
    }

    //show all result

    public function allResult()
    {
        $results = Exam::where('user_id',Auth::user()->id)->get();
        return view('test.allresult')->with('results',$results);
    }

}
