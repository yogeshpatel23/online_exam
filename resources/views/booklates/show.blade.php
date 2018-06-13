@extends('layouts.admin')

@section('title', 'Booklate')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="box box-success">
                @if(count($questions)>0)
                <div class="box-header with-border">
                    <h3 class="box-title">Questions in {{ $questions[0]->booklate->booklate_name }}</h3>
                </div>
                <div class="box-body">
                    @foreach($questions as $question)
                        <div class="box box-widget widget-user-2 mb-3">
                            <div class="widget-user-header bg-yellow">
                                <h5 class="box-title" style="margin-left:100px;" >{{$question->questions}}</h5>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">A)  {{$question->opt_a}}</div>
                                    <div class="col-md-6">B)  {{$question->opt_b}}</div>
                                    <div class="col-md-6">C)  {{$question->opt_c}}</div>
                                    <div class="col-md-6">D)  {{$question->opt_d}}</div>
                                </div>
                            </div>
                            <div class="box-footer bg-green">
                                <strong> Answer :- {{$question->ans}} </strong>
                                   
                                    <form action="/questions/{{ $question->qbid }}" method="POST" class="form-inline pull-right">
                                    @method('DELETE')
                                    @csrf
                                    <div class="btn-group btn-group-sm" role="group" aria-label="...">
                                    <a href="/questions/{{$question->qusid}}" class="btn btn-primary"> View </a>
                                    <a href="/questions/{{$question->qusid}}/edit" class="btn btn-primary"> Edit </a>
                                        <button type="submit" class="btn btn-primary">
                                        {{ __('Delete') }}
                                        </button>
                                    </div>
                                    </form>
                                
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="box-footer">
                </div>
                @else
                    <p>No Question found</p>
                @endif
                
            </div>
        </div>
    </div>
</div>
@endsection
