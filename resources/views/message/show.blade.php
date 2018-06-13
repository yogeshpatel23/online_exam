@extends('layouts.app')

@section('title','Read Massages')

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
                    <li class="nav-item"><a href="/messages" class="nav-link">Inbox</a></li>
                    <li class="nav-item"><a href="/messages/send" class="nav-link">Sent</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Read Massages</h3>
            </div>
            <div class="box-body">
                @if(count($message)>0)
                    <h3 class="box-title">{{ $message->subject }}</h3>
                    <p><small>From :- {{ $message->sender->first_name }}</small><small class="pull-right">{{ date_format($message->created_at,"jS M y h:i:s a") }}</small></p>
                    <hr>
                    <div>
                        {!! $message->msg_body !!}
                    </div>
                @endif
            </div>
            <div class="box-footer">
                
            </div>
            
        </div>
    </div>
</div>

@endsection