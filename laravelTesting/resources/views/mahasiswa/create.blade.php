@extends('layouts.main', ['title' => 'Create Data'])

@section('content')
    <div class="container text-center my-md-5">
        <h1>Create New Data</h1>
    </div>

    <form class="col-md-6 mx-auto" action="{{ route('mahasiswa.store') }}" method="POST">
        @csrf
        <div class="mb-md-3 ">
            <label for="name">Nama Mahasiswa</label>
            <input type="text" class="form-control" name="name" id="name">
        </div>
        <div class="mb-md-3">
            <label for="nim">NIM Mahasiswa</label>
            <input type="text" class="form-control" name="nim" id="nim">
        </div>
        <div class="mb-md-3">
            <label for="jurusan">Jurusan Mahasiswa</label>
            <input type="text" class="form-control" name="jurusan" id="jurusan">
        </div>
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>

@endsection
