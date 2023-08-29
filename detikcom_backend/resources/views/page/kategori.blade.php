@extends('layouts.main')

@section('content')

<div class="container mt-5">
    <h1>Semua Buku : {{ $namaKategori->nama }}</h1>

    <div class="col-md-3">
        <div class="dropdown">
            <a class="btn btn-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                Daftar Buku
            </a>

            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                @foreach($kategoris as $kategori)
                <li>
                    <a class="dropdown-item" href="/kategori/{{ $kategori->slug }}">
                            {{ $kategori->nama }}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

<div class="container mt-3">
    <div class="row">
        @foreach($bukus as $buku)
            <div class="col py-5 ">
                <div class="card" style="width: 18rem;">
                    @if($buku->coverBuku)
                    <div style="max-height: 400; max-width: 600;overflow: hidden;">
                        <img src="{{ asset('storage/'.$buku->coverBuku) }}"  class="card-img-top">
                    </div>
                    @else
                    <img src="https://source.unsplash.com/400x600/?{{$buku->kategori->nama}}" width="600" height="400" class="card-img-top img-fluid">
                    @endif
                        <div class="card-body">
                            <h3 class="card-title">{{ $buku->judul }}</h3>
                            <p class="card-text"> {{ $buku->user->nama }} | {{ $buku->kategori->nama }}</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                </div>
            </div>
        @endforeach

    </div>
</div>


@endsection
