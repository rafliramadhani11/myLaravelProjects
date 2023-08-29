@extends('dashboard.layouts.main')

@section('container')
<!-- MAIN CONTENT -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center my-lg-3 border-bottom">
        <h1> Buku Kategori </h1>
    </div>

    <div class="my-3">
        <a href="{{ route('kategoris.create') }}" class="btn btn-primary">Buat Kategori</a>
    </div>

    @if (session()->has('success'))
    <div class="w-50  col-sm-8 alert alert-success alert-dismissible fade show " role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif


    <div class="table-responsive col-md-6">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kategoris as $kategori )
                <tr>
                    <td> {{ $loop->iteration }} </td>
                    <td> {{ $kategori->nama }} </td>
                    <td>
                        <a href="{{ route('kategoris.edit', $kategori->slug) }}" class="btn btn-sm btn-warning ">
                            <span data-feather="edit"></span>
                            Ubah
                        </a>
                        <form class="d-inline" action="{{ route('kategoris.destroy', $kategori->slug) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-danger ">
                                <span data-feather="x"></span>
                                Delete
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
