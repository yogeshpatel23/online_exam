@extends('layouts.admin')

@section('title', 'Questions')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Questions</h3>
                </div>
                @if(count($questions)>0)
                <div class="box-body">
                    <table class="table table-sm">
                    <thead></thead>
                        <tr>
                            <th>Booklate Name</th>
                            <th>Question</th>
                            <th>Opt A</th>
                            <th>Opt B</th>
                            <th>Opt C</th>
                            <th>Opt D</th>
                            <th>Answer</th>
                            <th>Updated @</th>
                            <th></th>
                        </tr>
                    @foreach($questions as $question)
                        <tr>
                            <td>{{$question->booklate->booklate_name}}</td>
                            <td>{{$question->questions}}</td>
                            <td>{{$question->opt_a}}</td>
                            <td>{{$question->opt_b}}</td>
                            <td>{{$question->opt_c}}</td>
                            <td>{{$question->opt_d}}</td>
                            <td>{{$question->ans}}</td>
                            <td>{{date_format($question->updated_at,"jS M y")}}</td>
                            <th>
                                <div class="btn-group btn-group-sm" role="group" aria-label="...">
                                    <a href="/questions/{{$question->qusid}}" class="btn btn-primary"> View </a>
                                    <a href="/questions/{{$question->qusid}}/edit" class="btn btn-primary"> Edit </a>
                                    <form action="/questions/{{ $question->qusid }}" method="POST" class="form-inline">
                                    @method('DELETE')
                                    @csrf
                                        <button type="submit" class="btn btn-primary">
                                        {{ __('Delete') }}
                                        </button>
                                    </form>
                                </div>
                            </th>
                        </tr>
                    @endforeach
                    </table>
                </div>
                <div class="box-footer">
                    {{$questions->links()}}
                </div>
                @else
                    <p>No Question found</p>
                @endif
                
            </div>
        </div>
    </div>
</div>
@endsection
