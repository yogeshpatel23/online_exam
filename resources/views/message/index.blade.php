@extends('layouts.app')

@section('title','Massages')

@section('content')
<h3>Massages</h3>
<div class="row">
    <div class="col-md-3">
        <a href="/messages/create" class="btn btn-primary btn-block">Compose</a>
        <div class="box box-solid mt-3">
            <div class="box-header with-border">
                <h3 class="box-title">Folders</h3>
            </div>
            <div class="box-body">
                <ul class="nav flex-column">
                    <li class="nav-item"><a href="/messages" class="nav-link active">Inbox</a></li>
                    <li class="nav-item"><a href="/messages/send" class="nav-link">Sent</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Inbox</h3>
            </div>
            <div class="box-body">
                @if(count($messages)>0)
                <table class="table">
                    <thead>
                        <tr>
                            <th>From</th>
                            <th style="width:50%">Subject</th>
                            <th>Date</th>
                            <th style="width:10%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($messages as $message)
                        <tr class="{{ $message->isread ? '' : 'table-primary' }}">
                            <td>{{ $message->sender->first_name }}</td>
                            <td>{{ $message->subject }}</td>
                            <td>{{ date_format($message->created_at,"jS M y H:i:s") }}</td>
                            <td>
                                <form action="/messages/{{ $message->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                        <a href="/messages/{{$message->id}}" class="btn btn-secondary">View</a>
                                        <button type="submit" class="btn btn-secondary">Delete</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                    <p>No Message</p>
                @endif
            </div>
            <div class="box-footer">
                @if(count($messages)>0)
                {{$messages->links()}}
                @endif
            </div>
            
        </div>
    </div>
</div>

@endsection