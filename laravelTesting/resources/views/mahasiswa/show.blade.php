@extends('layouts.main' ,['title' => 'Detail'])

@section('content')
<div class="container mt-3">
    <h1 class="my-5">Detail Mahasiswa</h1>
    <div class="card mb-3" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">{{ $mhs->name }}</h5>
          <h6 class="card-subtitle mb-2 text-body-secondary">{{ $mhs->nim}}</h6>
          <p class="card-text">{{ $mhs->jurusan }}</p>
        </div>
    </div>
    <a href="{{ route('mahasiswa.index') }}" class="badge bg-danger text-decoration-none p-2">
        Back
    </a>
</div>
@endsection
