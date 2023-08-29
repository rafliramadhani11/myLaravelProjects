@extends('layouts.main')

@section('content')

    <div class="container p-5">
        <div class="row d-flex justify-content-between">
            <div class="col-md-6">
                @if ($buku->coverBuku)
                <div >
                    <img src="{{ asset('storage/'.$buku->coverBuku) }}" width="600" height="800" class=" img-fluid " alt="...">
                </div>
                @else
                    <img src="https://source.unsplash.com/600x800/?{{$buku->kategori->nama}}" class=" " alt="...">
                @endif
            </div>
            <div class="col-md-5">
                <h1>{{ $buku->judul }}</h1>
                <h5>{{ $buku->user->nama }} | {{ $buku->kategori->nama }}</h5>

                <table class="table mt-5">
                    <tbody>
                        <tr>
                            <td>
                                <h5 style="color: rgba(0,0,0,0.6)">
                                    Judul
                                </h5>
                            </td>
                            <td>
                                <h5 style="color: rgba(0,0,0,0.6)">
                                    {{ $buku->judul }}
                                </h5>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5 style="color: rgba(0,0,0,0.6)">
                                    Deskripsi Buku
                                </h5>
                            </td>
                            <td>
                                <h5 style="color: rgba(0,0,0,0.6)">
                                    {{ $buku->deskripsi }}
                                </h5>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5 style="color: rgba(0,0,0,0.6)">
                                    Jumlah Buku
                                </h5>
                            </td>
                            <td>
                                <h5 style="color: rgba(0,0,0,0.6)">
                                    {{ $buku->jumlah }}
                                </h5>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5 style="color: rgba(0,0,0,0.6)">
                                    File Buku
                                </h5>
                            </td>
                            <td>
                                @if ($buku->fileBuku)
                                <h5 style="color: rgba(0,0,0,0.6)">
                                    <a href="{{ route('download', $buku->fileBuku) }}" class="btn btn-sm btn-primary ">
                                        Download
                                    </a>
                                </h5>
                                @else
                                <h5 style="color: rgba(0,0,0,0.6)">-</h5>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
                <a href="{{ route('buku') }}" class="btn btn-warning">
                    <i class="bi bi-arrow-return-left"></i>
                    Kembali
                </a>
            </div>
        </div>
    </div>

@endsection
