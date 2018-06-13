@extends('layouts.admin')

@section('title','User Info')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            @if($user)
            <div class="card" style="width: 18rem;">
                <img class="card-img" src="/uploads/avatars/{{ $user->picture }}" alt="Card image">
                <div class="card-img-overlay">
                  <h5 class="card-title">{{ $user->first_name . ' '. $user->last_name }}</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">e-Mail: <span class="pull-right">{{ $user->email }}</span></li>
                        <li class="list-group-item">Mobile: <span class="pull-right">{{ $user->mobile }}</span></li>
                        <li class="list-group-item">gender: <span class="pull-right">{{ $user->gender }}</span></li>
                        <li class="list-group-item">DOB: <span class="pull-right">{{ $user->dob }}</span></li>
                        <li class="list-group-item">City: <span class="pull-right">{{ $user->city }}</span></li>
                        <li class="list-group-item">Google Plus: <span class="pull-right">{{ $user->gpid }}</span></li>
                        <li class="list-group-item">Facebook: <span class="pull-right">{{ $user->fbid }}</span></li>
                        <li class="list-group-item">Twitter: <span class="pull-right">{{ $user->twid }}</span></li>
                    </ul>
                    <p class="card-text">Last updated {{ $user->updated_at }}</p>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection