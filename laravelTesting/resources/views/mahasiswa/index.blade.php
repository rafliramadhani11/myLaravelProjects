@extends('layouts.main', ['title' => 'Home Page'])

@section('content')
    <div class="container text-center my-md-5">
        <h1>Mahasiswa</h1>
    </div>

    <div class="col-md-10 mx-auto">
        <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary mb-md-3">Create New</a>
        <table class="table ">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">NIM</th>
              <th scope="col">Jurusan</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($mahasiswa as $i => $mhs)
            <tr>
              <th scope="row">{{ $i+1 }}</th>
              <td>{{ $mhs->name }}</td>
              <td>{{ $mhs->nim }}</td>
              <td>{{ $mhs->jurusan }}</td>
              <td >
                {{-- SHOW --}}
                <a href="{{ route('mahasiswa.show', $mhs->name ) }}" class="badge bg-success text-decoration-none p-2">
                    Detail
                </a>

                {{-- EDIT --}}
                <a href="{{ route('mahasiswa.edit', $mhs->name) }}" class="badge bg-warning text-decoration-none p-2">
                    Edit
                </a>

                {{-- DELETE --}}
                <form action="{{ route('mahasiswa.destroy', $mhs->name) }}" method="post" class="d-inline">
                    @csrf
                    @method('delete')
                    <button class="badge bg-danger text-decoration-none p-2 border-0 d-inline-block" onclick="confirm('are u sure ?')">
                        <span>Delete</span>
                    </button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
    </div>
@endsection
