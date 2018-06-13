@extends('layouts.admin')

@section('title','Users')

@section('content')
<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title">Users</h3>
    </div>
    @if(count($users)>0)
    <div class="box-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>e-Mail</th>
                    <th>isUser</th>
                    <th>isAdmin</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td><img src="/uploads/avatars/{{ $user->picture }}" alt="img of {{ $user->first_name}}" class="rounded-circle" width="30" height="30" ></td>
                        <td>{{ $user->first_name .' '. $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td> <input form="form{{$user->id}}" type="checkbox" name="isUser" id="isUser" {{ $user->hasRole('User') ? 'checked': '' }} > </td>
                        <td> <input form="form{{$user->id}}" type="checkbox" name="isAdmin" id="isAdmin" {{ $user->hasRole('Admin') ? 'checked': '' }}> </td>
                        <td>
                            <form id="form{{$user->id}}" action="/users/assign/{{ $user->id }}" method="POST">
                                @csrf
                                <div class="btn-group btn-group-sm">
                                    <a href="/users/{{ $user->id }}" class="btn btn-outline-success">View</a>
                                    <input type="submit" class="btn btn-outline-success" value="Assign Role">
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="box-footer"></div>
    @else
    <p>No Users</p>
    @endif
</div>
@endsection