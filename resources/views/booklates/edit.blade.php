@extends('layouts.admin')

@section('title', 'Edit Booklate')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Booklate</h3>
                </div>

                <div class="box-body">
                @if(count($booklate)>0)
                    <form method="POST" action="/booklate/{{ $booklate->qbid }}">
                        @method('PUT')
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="exam_name">{{ __('Exam Name') }}</label>
                                <input id="exam_name" type="text" class="form-control{{ $errors->has('exam_name') ? ' is-invalid' : '' }}" name="exam_name" value="{{ $booklate->exam_name }}" required>

                                @if ($errors->has('exam_name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('exam_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="booklate_name">{{ __('Booklate Name') }}</label>
                                <input id="booklate_name" type="text" class="form-control{{ $errors->has('booklate_name') ? ' is-invalid' : '' }}" name="booklate_name" value="{{$booklate->booklate_name}}" required autofocus>

                                @if ($errors->has('booklate_name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('booklate_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="total_question">{{ __('Total Question') }}</label>
                                <input id="total_question" type="text" class="form-control{{ $errors->has('total_question') ? ' is-invalid' : '' }}" name="total_question" value="{{ $booklate->total_question }}" required>

                                @if ($errors->has('total_question'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('total_question') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="total_time">{{ __('Total Time in Minutes') }}</label>
                                <input id="total_time" type="text" class="form-control{{ $errors->has('total_time') ? ' is-invalid' : '' }}" name="total_time" value="{{ $booklate->total_time }}" required>

                                @if ($errors->has('total_time'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('total_time') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="correct_mark">{{ __('Correct Mark') }}</label>
                                <input id="correct_mark" type="text" class="form-control{{ $errors->has('correct_mark') ? ' is-invalid' : '' }}" name="correct_mark" value="{{ $booklate->correct_mark }}" required>

                                @if ($errors->has('correct_mark'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('correct_mark') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="minuse_mark">{{ __('Minuse Mark') }}</label>
                                <input id="minuse_mark" type="text" class="form-control{{ $errors->has('minuse_mark') ? ' is-invalid' : '' }}" name="minuse_mark" value="{{ $booklate->minuse_mark }}" required>

                                @if ($errors->has('minuse_mark'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('minuse_mark') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="booklate_type">{{ __('Booklate Type') }}</label>
                                <select class="form-control" name="booklate_type" id="booklate_type">
                                    <option value="0" {{ $booklate->booklate_type == 0 ? 'selected':'' }}>Free</option>
                                    <option value="1" {{ $booklate->booklate_type == 1 ? 'selected':'' }}>Paid</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="booklate_amount">{{ __('Price') }}</label>
                                <input id="booklate_amount" type="text" class="form-control{{ $errors->has('booklate_amount') ? ' is-invalid' : '' }}" name="booklate_amount" value="{{ $booklate->booklate_amount }}">

                                @if ($errors->has('booklate_amount'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('booklate_amount') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update Booklate') }}
                                </button>
                            </div>
                        </div>
                    </form>
                @else
                    <p>Error</p>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection