<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booklate;

class BooklatesController extends Controller
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
        // $booklates = Booklate::orderBy('qbid','desc')->get();
        $booklates = Booklate::orderBy('qbid','desc')->paginate(10);
        return view('booklates.index')->with('booklates',$booklates);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('booklates.create');
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
            'booklate_name'     => 'required',
            'exam_name'         => 'required',
            'total_question'    => 'required|numeric',
            'total_time'        => 'required|numeric',
            'correct_mark'      => 'required|numeric',
            'minuse_mark'       => 'required|numeric',
            'booklate_type'     => 'required|numeric',
            'booklate_amount'   => 'required_if:booklate_type,1|numeric|nullable'
        ],[
            'booklate_amount.required_if'    => 'Enter Amount for Booklate!'
        ]);
        
        $booklate = new Booklate;

        $booklate->booklate_name = $request->input('booklate_name');
        $booklate->exam_name = $request->input('exam_name');
        $booklate->total_question = $request->input('total_question');
        $booklate->total_time = $request->input('total_time');
        $booklate->correct_mark = $request->input('correct_mark');
        $booklate->minuse_mark = $request->input('minuse_mark');
        $booklate->total_mark = $request->input('total_question')*$request->input('correct_mark');
        $booklate->booklate_type = $request->input('booklate_type');
        $booklate->booklate_amount = $request->input('booklate_amount');

        $booklate->save();

        return redirect('/booklate');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $booklate =  Booklate::find($id);
        return view('booklates.show')->with('questions',$booklate->questions);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booklate = Booklate::where('qbid',$id)->first();
        return view('booklates.edit')->with('booklate',$booklate);
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
            'booklate_name'     => 'required',
            'exam_name'         => 'required',
            'total_question'    => 'required|numeric',
            'total_time'        => 'required|numeric',
            'correct_mark'      => 'required|numeric',
            'minuse_mark'       => 'required|numeric',
            'booklate_type'     => 'required|numeric',
            'booklate_amount'   => 'required_if:booklate_type,1|numeric|nullable'
        ],[
            'booklate_amount.required_if'    => 'Enter Amount for Booklate!'
        ]);
        
        $booklate = Booklate::where('qbid',$id)->first();

        $booklate->booklate_name = $request->input('booklate_name');
        $booklate->exam_name = $request->input('exam_name');
        $booklate->total_question = $request->input('total_question');
        $booklate->total_time = $request->input('total_time');
        $booklate->correct_mark = $request->input('correct_mark');
        $booklate->minuse_mark = $request->input('minuse_mark');
        $booklate->total_mark = $request->input('total_question')*$request->input('correct_mark');
        $booklate->booklate_type = $request->input('booklate_type');
        $booklate->booklate_amount = $request->input('booklate_amount');

        $booklate->save();

        return redirect('/booklate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $booklate = Booklate::find($id);
        $booklate->delete();
        return redirect('/booklate');
    }
}
