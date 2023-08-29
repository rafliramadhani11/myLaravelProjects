@extends('layouts.main')

@section('content')
    <div class="container my-5">
        <h1>Hello {{ auth()->user()->nama }}</h1>
    </div>
@endsection
