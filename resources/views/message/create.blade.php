@extends('layouts.app')

@section('title','New Messsage')

@section('content')
<h3>new Message</h3>
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
                <h3 class="box-title">Compose New</h3>
            </div>
            <form action="/messages" method="POST">
                <div class="box-body">
                    @csrf
                    <label for="user_id" class="sr-only">To:</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">To:</span>
                        </div>
                        <select name="user_id" id="user_id" class="form-control{{ $errors->has('user_id') ? ' is-invalid' : '' }}">
                            <option value="">{{__('Select')}}</option>
                            @if (count($users)>0)
                                @foreach($users as $user)
                                    @if(Auth::user()->hasRole('User'))
                                        @if( $user->hasRole('User'))
                                        @continue
                                        @endif
                                    @endif
                                    <option value="{{ $user->id}}" {{ old('user_id') ==  $user->id ? 'selected' :'' }} >{{ $user->first_name}} {{ $user->last_name}} ({{ $user->email}}) </option>
                                @endforeach
                            @endif
                        </select>
                        @if ($errors->has('user_id'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('user_id') }}</strong>
                            </span>
                        @endif
                    </div>
                    <label for="subject" class="sr-only" >Subject</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Subject</span>
                        </div>
                        <input type="text" class="form-control{{ $errors->has('subject') ? ' is-invalid' : '' }}" id="subject" name="subject" value="{{ old('subject')}}" placeholder="Subject">
                        @if ($errors->has('subject'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('subject') }}</strong>
                            </span>
                        @endif
                    </div>
                    <label for="msg_body" class="sr-only" >Message</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Message</span>
                        </div>
                        <textarea name="msg_body" id="msg_body" class="form-control{{ $errors->has('msg_body') ? ' is-invalid' : '' }}" rows="10" placeholder="Type Here...">{{ old('msg_body')}}</textarea>
                        @if ($errors->has('msg_body'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('msg_body') }}</strong>
                            </span>
                        @endif
                        {{-- <input type="text"  id="msg_body" name="msg_body" placeholder="Type Heare"> --}}
                    </div>
                </div>
                <div class="box-footer">
                    <input type="hidden" name="from_id" id="from_id" value="{{ Auth::user()->id }}">
                    <button type="submit" class="btn btn-success">Send</button>
                </div>
            </form>
            </div>
    </div>
</div>
@endsection