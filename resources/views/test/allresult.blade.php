@extends('layouts.app')

@section('title','All result')

@section('content')
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">All Results</h3>
    </div>
    <box-body>
        <table class="table">
            <thead>
                <th>Test Name</th>
                <th>Correct Ans</th>
                <th>Incorrect Ans</th>
                <th>Score</th>
                <th>Date</th>
                <th></th>
            </thead>
            <tbody>
                @if(count($results)>0)
                @foreach($results as $result)
                <tr>
                    <td>{{ $result->booklate->booklate_name }}</td>
                    <td>{{ $result->total_correct }}</td>
                    <td>{{ $result->total_incorrect }}</td>
                    <td>{{ $result->mark }}</td>
                    <td>{{ $result->updated_at }}</td>
                    <td><a href="/result/{{ $result->id }}" class="btn btn-info"> View </a></td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </box-body>
</div>
@endsection