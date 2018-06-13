@extends('layouts.app')

@section('title', 'Access Denied')

@section('content')
    <h1>{{ $exception->getMessage() }}</h1>
@endsection