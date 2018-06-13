@extends('layouts.admin')

@section('title', 'Edit Question')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Question</h3>
                </div>

                <div class="box-body">
                @if(count($question)>0)
                <form method="POST" action="/questions/{{ $question->qusid }}">
                        @method('PUT')
                        @csrf
                        <div class="form-group col-md-6">
                            <label for="qbid">{{ __('Booklate Name') }}</label>
                            <select class="form-control{{ $errors->has('qbid') ? ' is-invalid' : '' }}" name="qbid" id="qbid">
                                <option value="">{{ __('<-- Seclect -->') }}</option>
                                @foreach($booklates as $booklate)
                                    <option value="{{ $booklate->qbid }}" {{ $question->qbid == $booklate->qbid ? 'selected':'' }}>{{ $booklate->booklate_name }}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('qbid'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('qbid') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="questions">{{ __('Question') }}</label>
                            <textarea name="questions" id="questions" class="form-control{{ $errors->has('questions') ? ' is-invalid' : '' }}" rows="4">{{ $question->questions }}</textarea>
                            @if ($errors->has('questions'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('questions') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-row">
                            <label for="opt_a" class="sr-only">{{ __('Opt A') }}</label>
                            <div class="input-group mb-3 col-md-6">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Opt A</span>
                                </div>
                                <input id="opt_a" type="text" class="form-control{{ $errors->has('opt_a') ? ' is-invalid' : '' }}" name="opt_a" value="{{ $question->opt_a }}" required>

                                @if ($errors->has('opt_a'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('opt_a') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <label for="opt_b" class="sr-only">{{ __('Opt B') }}</label>
                            <div class="input-group mb-3 col-md-6">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Opt B</span>
                                </div>
                                <input id="opt_b" type="text" class="form-control{{ $errors->has('opt_b') ? ' is-invalid' : '' }}" name="opt_b" value="{{ $question->opt_b }}" required>

                                @if ($errors->has('opt_b'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('opt_b') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <label for="opt_c" class="sr-only">{{ __('Opt C') }}</label>
                            <div class="input-group mb-3 col-md-6">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Opt C</span>
                                </div>
                                <input id="opt_c" type="text" class="form-control{{ $errors->has('opt_c') ? ' is-invalid' : '' }}" name="opt_c" value="{{ $question->opt_c }}" required>

                                @if ($errors->has('opt_c'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('opt_c') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <label for="opt_d" class="sr-only">{{ __('Obt D') }}</label>
                            <div class="input-group mb-3 col-md-6">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Opt D</span>
                                </div>
                                <input id="opt_d" type="text" class="form-control{{ $errors->has('opt_d') ? ' is-invalid' : '' }}" name="opt_d" value="{{ $question->opt_d }}" required>

                                @if ($errors->has('opt_d'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('opt_d') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="ans">{{ __('Answer') }}</label>
                            <select class="form-control{{ $errors->has('ans') ? ' is-invalid' : '' }}" name="ans" id="ans">
                                <option value="{{ $question->ans }}">{{ $question->ans }}</option>
                            </select>
                            @if ($errors->has('ans'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('ans') }}</strong>
                                </span>
                            @endif
                        </div>
                        
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update Question') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <script>
                        var dd = document.getElementById('ans');
                        dd.addEventListener('focus',()=>{
                            var a = document.getElementById('opt_a').value;
                            var b = document.getElementById('opt_b').value;
                            var c = document.getElementById('opt_c').value;
                            var d = document.getElementById('opt_d').value;
                            var dd_opt = `<option value=''><-- Seclect --></option>`;
                            dd_opt += `<option value='${a}'>${a}</option>`;
                            dd_opt += `<option value='${b}'>${b}</option>`;
                            dd_opt += `<option value='${c}'>${c}</option>`;
                            dd_opt += `<option value='${d}'>${d}</option>`;
                            dd.innerHTML = dd_opt;
                        });
                    </script>
                    @else
                        <p>Create Booklate First</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection