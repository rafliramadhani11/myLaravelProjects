@extends('dashboard.layouts.main')

@section('container')
<!-- MAIN CONTENT -->
<main class="col-md-7 ms-sm-auto col-lg-10 p-md-4">
    <div class="container  mb-3">
        <div class="my-3">
            <a href="/dashboard/bukus" class="btn btn-success"><span data-feather="arrow-left"></span>Kembali ke Data Buku Saya</a>
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                @if ($buku->coverBuku)
                <div >
                    <img src="{{ asset('storage/'.$buku->coverBuku) }}" width="600" height="800" class=" img-fluid " alt="...">
                </div>
                @else
                <img src="https://source.unsplash.com/600x800/?{{$buku->kategori->nama}}" class=" " alt="...">
                @endif
            </div>
            <div class="col-6">
                <h1>{{ $buku->judul }}</h1>
                <h5>{{ auth()->user()->nama }} | {{ $buku->kategori->nama }}</h5>

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

                <form action="{{ route('bukus.destroy', $buku->slug) }}" method="post" class="d-inline">
                    @csrf
                    @method('delete')
                    <button class="btn btn-sm btn-danger me-3">
                        <span data-feather="x" class="me-1"></span>
                        Hapus
                    </button>
                </form>
                <a class="btn btn-sm btn-warning" href="{{ route('bukus.edit', $buku->slug) }}">
                    <span data-feather="edit" class="me-1"></span>
                    Ubah Data
                </a>
            </div>
        </div>
    </main>
    <!-- --------------- -->
    @endsection
    {{-- <p>{{ $buku->user->nama }} | {{ $buku->kategori->nama}} <small>( {{ $buku->created_at->diffForHumans() }} )</small></p>

    <div class="my-3">
        @if ($buku->coverBuku)
        <div style="max-width: 400px;max-height: 1200px;">
            <img src="{{ asset('storage/'.$buku->coverBuku) }}" class=" img-fluid " alt="...">
        </div>
        @else
        <img src="https://source.unsplash.com/1200x400/?{{$buku->kategori->nama}}" class=" img-fluid " alt="...">
        @endif
    </div>

    <h3> {{ $buku->judul }} </h3>
</div> --}}
