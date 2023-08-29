@extends('dashboard.layouts.main')

@section('container')
<!-- MAIN CONTENT -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center my-lg-3 border-bottom">
        <h1> Buku Saya </h1>
    </div>

    <div class="my-3">
        <a href="{{ route('bukus.create') }}" class="btn btn-primary">Buat Buku</a>
    </div>

    @if (session()->has('success'))
    <div class="w-50  col-sm-8 alert alert-success alert-dismissible fade show " role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="table-responsive col-md-10">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bukus as $buku )
                <tr>
                    <td> {{ $loop->iteration }} </td>
                    <td> {{ $buku->judul }} </td>
                    <td> {{ $buku->kategori->nama }} </td>
                    <td>
                        <a href="{{ route('bukus.show', $buku->slug) }}" class="badge bg-primary text-decoration-none ">
                            <span data-feather="eye"></span>
                        </a>
                        <a href="{{ route('bukus.edit', $buku->slug) }}" class="badge bg-warning text-decoration-none ">
                            <span data-feather="edit"></span>
                        </a>
                        <form class="d-inline" action="{{ route('bukus.destroy', $buku->slug) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="badge bg-danger border-0">
                                <span data-feather="delete"></span>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
<!-- --------------- -->
@endsection
