@extends('layouts.main', ['title' => 'Create Data'])

@section('content')
    <div class="container text-center my-md-5">
        <h1>Edit Data</h1>
    </div>

    <form class="col-md-6 mx-auto" action="{{ route('mahasiswa.update', $mhs->name) }}" method="post">
        @method('put')
        @csrf
        <div class="mb-md-3 ">
            <label for="name">Nama Mahasiswa</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $mhs->name }}">
        </div>
        <div class="mb-md-3">
            <label for="nim">NIM Mahasiswa</label>
            <input type="text" class="form-control @error('nim') is-invalid @enderror" name="nim" id="nim" value="{{ old('nim', $mhs->nim) }}">
            @error('nim')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-md-3">
            <label for="jurusan">Jurusan Mahasiswa</label>
            <input type="text" class="form-control" name="jurusan" id="jurusan" value="{{ $mhs->jurusan }}">
        </div>
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>

@endsection
