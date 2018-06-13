@extends('layouts.app')

@section('title', 'Profile')

@section('content')
@if ($errors->has('profile_img'))
    <div class="">
        <strong>{{ $errors->first('profile_img') }}</strong>
    </div>
    @endif
<div class="row mt-2">
    <div class="col-md-3">
        <div class="box box-widget widget-user">
            <div class="widget-user-header bg-aqua-active">
                <h2 class="widget-user-name">{{ $user->first_name .' '.$user->last_name }}</h2>
                {{-- <h5 class="widget-user-desc">{{$user->email }}</h5> --}}
            </div>
            <div class="widget-user-image">
                <img src="/uploads/avatars/{{ $user->picture }}" alt="user image" class="img-fluid rounded-circle" onclick="openPopwin();">
                <p class="text-muted text-center" onclick="openPopwin();" style="cursor: pointer;" ><small>Change Image</small></p>
            </div>
            <div class="box-footer mt-5 text-center">
                <a href="https://plus.google.com/{{ $user->gpid }}" target="_blank" class="btn-circle bg-maroon"><i class="fa fa-google-plus"></i></a>
                <a href="https://www.facebook.com/{{ $user->fbid }}" target="_blank" class="btn-circle bg-light-blue"><i class="fa fa-facebook"></i></a>
                <a href="https://twitter.com/{{ $user->twid }}" target="_blank" class="btn-circle bg-aqua" ><i class="fa fa-twitter"></i></a>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="custom-tab">
            <div class="tab" role="tabpanel">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item ">
                        <a class="nav-link active" href="#profile1" role="tab" data-toggle="tab" aria-controls="home" aria-selected="true"><span><i class="fa fa-user"></i></span> Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#references" role="tab" data-toggle="tab" aria-controls="references" aria-selected="true"><span><i class="fa fa-cog"></i></span> Setting</a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content p-3">
                    <div role="tabpanel" aria-labelledby="home-tab" class="tab-pane fade show active" id="profile1">
                        <form action="/profile/{{ $user->id }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="first_name">First Name</label>
                                    <input type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" id="first_name" value="{{ $user->first_name }}" placeholder="First Name">
                                    @if ($errors->has('first_name'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('first_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" id="last_name"  value="{{ $user->last_name }}" placeholder="Last Name">
                                    @if ($errors->has('last_name'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('last_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="dob">Dob</label>
                                    <input type="date" class="form-control{{ $errors->has('dob') ? ' is-invalid' : '' }}" name="dob" id="dob" value="{{ $user->dob }}">
                                    @if ($errors->has('dob'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('dob') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="gender">Gender</label>
                                    <select name="gender" id="gender" class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}">
                                        <option value="">Select</option>
                                        <option value="male" {{ $user->gender == 'male' ? 'Selected': '' }} >Male</option>
                                        <option value="female" {{ $user->gender == 'female' ? 'Selected': '' }} >Female</option>
                                    </select>
                                    @if ($errors->has('gender'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('gender') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="mobile">Mobile</label>
                                    <input type="text" class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" id="mobile" value="{{ $user->mobile }}" placeholder="9012345678">
                                    @if ($errors->has('mobile'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('mobile') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" id="city"  value="{{ $user->city }}" placeholder="City">
                                    @if ($errors->has('city'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('city') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="edu">Education</label>
                                    <input type="text" class="form-control{{ $errors->has('edu') ? ' is-invalid' : '' }}" name="edu" id="edu" value="{{ $user->edu }}" placeholder="Last Education">
                                    @if ($errors->has('edu'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('edu') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="prof">Profession</label>
                                    <input type="text" class="form-control{{ $errors->has('prof') ? ' is-invalid' : '' }}" name="prof" id="prof"  value="{{ $user->prof }}" placeholder="Profession">
                                    @if ($errors->has('prof'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('prof') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gpid" class="col-sm-2 col-form-label">Google plus</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control{{ $errors->has('gpid') ? ' is-invalid' : '' }}" name="gpid" id="gpid" value="{{ $user->gpid }}" placeholder="Google plus ID">
                                    @if ($errors->has('gpid'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('gpid') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fbid" class="col-sm-2 col-form-label">Facebook</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control{{ $errors->has('fbid') ? ' is-invalid' : '' }}" name="fbid" id="fbid" value="{{ $user->fbid }}" placeholder="Facebook ID">
                                    @if ($errors->has('fbid'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('fbid') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="twid" class="col-sm-2 col-form-label">Twitter</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control{{ $errors->has('twid') ? ' is-invalid' : '' }}" name="twid" id="twid" value="{{ $user->twid }}" placeholder="Twitter ID">
                                    @if ($errors->has('twid'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('twid') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                    <div role="tabpanel" aria-labelledby="references-tab" class="tab-pane fade" id="references">
                        fes
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- File Upload Pop Up Windwo-->
<div class="pop-win hide">
    <h2 class="text-center mt-5" style="color:#fff">{{ config('app.name', 'Just Hindustan') }}</h2>
    <div class="row justify-content-center mt-5" >
        <div class="col-md-6">
            <div class="box p-3">
                <p class="close-pop" onclick="closePopwin();" >Close[X]</p>
                <h3 class="box-title">Change Profile Picture</h3>
                
                <form action="/profile/img/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="profile_img" id="profile_img">
                            <label class="custom-file-label" for="profile_img">Choose file</label>
                        </div>
                        <div class="input-group-append">
                                <button type="submit" class="input-group-text">Upload</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.form-box -->
        </div>
    </div>
</div>
@endsection