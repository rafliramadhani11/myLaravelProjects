@extends('dashboard.layouts.main')

@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center my-lg-3 border-bottom">
        <h2>Ubah Kategori</h2>
    </div>

    <div class="my-3">
        <a href="/dashboard/kategoris" class="btn btn-success"><span data-feather="arrow-left"></span>Kembali ke Kategori</a>
    </div>

    <div class="col-lg-4">
        <form method="post" action="{{ route('kategoris.update', $kategori->slug) }}">
            @csrf
            @method('put')
            <div class="mb-3">
                <input type="hidden" name="user_id" value="{{old('user_id', $kategori->user_id)}}">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Kategori</label>
                <input type="text" id="judul" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{old('nama', $kategori->nama)}}"    autofocus >
                @error('nama')
                <div class="invalid-feedback">
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{old('slug', $kategori->slug)}}">
                @error('slug')
                <div>
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mb-3">Ubah Kategori</button>
        </form>
    </div>
</main>


@endsection
