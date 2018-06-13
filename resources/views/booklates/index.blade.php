@extends('layouts.admin')

@section('title', 'Booklate')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Booklates</h3>
                </div>
                @if(count($booklates)>0)
                <div class="box-body">
                    <table class="table table-sm">
                    <thead></thead>
                        <tr>
                            <th>Exam Name</th>
                            <th>Bookalte Name</th>
                            <th>Total Question</th>
                            <th>Total Time</th>
                            <th>Correct Mark</th>
                            <th>Minuse Mark</th>
                            <th>Amount</th>
                            <th>Updated @</th>
                            <th></th>
                        </tr>
                    @foreach($booklates as $booklate)
                        <tr>
                            <td>{{$booklate->exam_name}}</td>
                            <td>{{$booklate->booklate_name}}</td>
                            <td>{{$booklate->total_question}}</td>
                            <td>{{$booklate->total_time}}</td>
                            <td>{{$booklate->correct_mark}}</td>
                            <td>{{$booklate->minuse_mark}}</td>
                            <td>{{$booklate->booklate_amount}}</td>
                            <td>{{date_format($booklate->updated_at,"jS M y")}}</td>
                            <th>
                                <div class="btn-group btn-group-sm" role="group" aria-label="...">
                                    <a href="/booklate/{{$booklate->qbid}}" class="btn btn-primary"> View </a>
                                    <a href="/booklate/{{$booklate->qbid}}/edit" class="btn btn-primary"> Edit </a>
                                    <form action="/booklate/{{ $booklate->qbid }}" method="POST" class="form-inline">
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
                    {{$booklates->links()}}
                </div>
                @else
                    <p>No Booklate found</p>
                @endif
                
            </div>
        </div>
    </div>
</div>
@endsection
