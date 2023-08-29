@extends('dashboard.layouts.main')

@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center my-lg-3 border-bottom">
        <h2>Buat Kategori Baru</h2>
    </div>

    <div class="col-lg-4">
        <form method="post" action="{{ route('kategoris.store') }}">
            @csrf
            <div class="mb-3">
                <input type="hidden" name="user_id">
            </div>

            <div class="mb-3">
                <label for="judul" class="form-label">Nama Kategori</label>
                <input type="text" id="judul" class="form-control" name="nama"  autofocus>
            </div>

            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug">
            </div>
            <button type="submit" class="btn btn-primary mb-3">Buat Kategori</button>
        </form>
    </div>
</main>


@endsection
