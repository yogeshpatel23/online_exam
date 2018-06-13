@extends('layouts.app')

@section('title','Result')

@section('content')
<style>
    .info-bar{
     padding: 5px;
     margin-bottom: 10px;
     text-align: center;
     background-color: #fff;
     box-shadow: 0px 5px 3px #666;
   }
   </style>
    <div class="info-bar">
        <h5>{{ Auth::user()->first_name .' '.Auth::user()->last_name }}, You Have Given Exam on {{date_format($result->updated_at,"jS M y")}}</h5>
    </div>

<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="box box-success">
                <nav class="nav flex-column">
                    <a class="nav-link" href="#ananlysis">Ananlysis</a>
                    <a class="nav-link" href="#answer">Answers</a>
                </nav>
            </div>
        </div>
        <div class="col-md-10">
            <div id="ananlysis" class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Ananlysis</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text" class="dial" value="{{$result->total_correct}}"
                            data-min="0" data-max="{{$result->booklate->total_question}}" data-fgColor="#00FF00" data-angleArc="300" data-angleOffset="-150">

                            <h3 class="text-center" style="margin:0" >Correct</h3>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="dial" value="{{$result->total_incorrect}}"
                            data-min="0" data-max="{{$result->booklate->total_question}}" data-fgColor="#FF0000" data-angleArc="300" data-angleOffset="-150">
                            <h3 class="text-center" style="margin:0" >Incorrect</h3>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="dial" value="{{$result->mark}}"
                            data-min="0" data-max="{{$result->booklate->total_mark}}" data-fgColor="#00FF00" data-angleArc="300" data-angleOffset="-150">
                            <h3 class="text-center" style="margin:0" >Score</h3>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Anssder table  --}}
            <div id="answer" class="box box-success">
                <div class="box-header with-border">
                    <div class="box-title">Answers</div>
                </div>
                <div class="box-body">
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th style="width:50%">Question</th>
                                <th>Correct Answer</th>
                                <th>Your Answer</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $answer = json_decode($result->ans_list, true);
                            @endphp
                            @foreach($result->booklate->questions as $question)
                            <tr>
                                <td>{{ $question->questions}}</td>
                                <td>{{ $question->ans}}</td>
                                <td>{{ array_key_exists($question->qusid, $answer) ? $answer[$question->qusid] : 'Not Given' }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/knob.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>

<script>
    $(function() {
        $(".dial").knob({
            'readOnly': true,
            'width': '100%',
            'skin':"tron",
            'thickness': 0.20,
            'bgColor':"#ddd",
        });
    });
    
    $(document).ready(function() {
        $('.datatable').DataTable( {
            "searching":   false,
            'lengthChange': false,
            "pageLength": 5,
            "ordering": false,
            "info":     true
        });
    });
</script>
@endsection