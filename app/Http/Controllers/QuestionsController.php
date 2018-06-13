<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Booklate;

class QuestionsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('roles:Admin');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::orderBy('qusid','desc')->paginate(10);
        return view('questions.index')->with('questions',$questions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $booklates = Booklate::all('qbid','booklate_name');
        return view('questions.create')->with('booklates',$booklates);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'qbid'      => 'required',
            'questions' => 'required',
            'opt_a'     => 'required',
            'opt_b'     => 'required',
            'opt_c'     => 'required',
            'opt_d'     => 'required',
            'ans'       => 'required'
        ],[
            'qbid.required'      => 'Select a Booklate',
            'questions.required' => 'Enter Qustion',
            'ans.required'       => 'Select an Answar'
        ]);

        $question = new Question;
        $question->qbid = $request->input('qbid');
        $question->questions = $request->input('questions');
        $question->opt_a = $request->input('opt_a');
        $question->opt_b = $request->input('opt_b');
        $question->opt_c = $request->input('opt_c');
        $question->opt_d = $request->input('opt_d');
        $question->ans = $request->input('ans');

        $question->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::find($id);
        return view('questions.show')->with('question',$question);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booklates = Booklate::all('qbid','booklate_name');
        $question = Question::find($id);
        $data = array(
            'booklates' => $booklates,
            'question' => $question,
        );
        return view('questions.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'qbid'      => 'required',
            'questions' => 'required',
            'opt_a'     => 'required',
            'opt_b'     => 'required',
            'opt_c'     => 'required',
            'opt_d'     => 'required',
            'ans'       => 'required'
        ],[
            'qbid.required'      => 'Select a Booklate',
            'questions.required' => 'Enter Qustion',
            'ans.required'       => 'Select an Answar'
        ]);

        $question = Question::find($id);
        $question->qbid = $request->input('qbid');
        $question->questions = $request->input('questions');
        $question->opt_a = $request->input('opt_a');
        $question->opt_b = $request->input('opt_b');
        $question->opt_c = $request->input('opt_c');
        $question->opt_d = $request->input('opt_d');
        $question->ans = $request->input('ans');

        $question->save();

        return redirect('/questions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::find($id);
        $question->delete();
        return redirect('/questions');
    }
}
