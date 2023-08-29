@extends('dashboard.layouts.main')

@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center my-lg-3 border-bottom">
        <h2>Edit Data Buku </h2>
    </div>

        <div class="my-3">
            <a href="/dashboard/bukus" class="btn btn-success"><span data-feather="arrow-left"></span>Kembali ke Data Buku Saya</a>
        </div>

    <div class="col-lg-8">
        <form method="post" action="{{ route('bukus.update', $buku->slug) }}" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" id="judul" class="form-control @error('judul') is-invalid @enderror" name="judul" value="{{old('judul', $buku->judul)}}"    autofocus >
                @error('judul')
                <div class="invalid-feedback">
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{old('slug', $buku->slug)}}">
                @error('slug')
                <div>
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" value="{{old('deskripsi', $buku->deskripsi)}}">
                @error('deskripsi')
                <div>
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah Buku</label>
                <input type="number" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" name="jumlah" value="{{old('jumlah', $buku->jumlah)}}">
                @error('jumlah')
                <div>
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="kategori" class="form-label ">Category</label>
                <select class="form-select " id="kategori" name="kategori_id" required>
                    <option selected disabled></option>
                    @foreach ($kategoris as $kategori)
                        @if (old('kategori_id', $buku->kategori->id) == $kategori->id)
                        <option value="{{ $kategori->id }}" selected>{{ $kategori->nama }}</option>
                        @else
                        <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="coverBuku" class="form-label ">Cover Buku</label>
                @if ($buku->coverBuku)
                    <input type="hidden" value="{{$buku->coverBuku}}" name="coverBuku">
                    <img src="{{ asset('storage/'. $buku->coverBuku) }}" alt="" class="img-preview img-fluid col-sm-5 mb-3 d-block">
                @else
                    <img class="img-preview img-fluid col-sm-5 mb-3 d-block">
                @endif
                <input type="file" class="form-control @error('coverBuku') is-invalid @enderror" id="coverBuku" name="coverBuku" onchange="previewImage()">
                @error('coverBuku')
                <div>
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="formFile" class="form-label">File Buku ( pdf )</label>
                @if($buku->fileBuku)
                    <input type="hidden" value="{{$buku->fileBuku}}" name="oldfileBuku">
                @endif
                    <input class="form-control @error('fileBuku') is-invalid @enderror" type="file" id="fileBuku" name="fileBuku">
                @error('fileBuku')
                <div>
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary mb-3">Ubah Data Buku</button>
        </form>
    </div>
</main>


@endsection
