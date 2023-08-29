@extends('dashboard.layouts.main')

@section('container')
<!-- MAIN CONTENT -->
<main class="col-md-7 ms-sm-auto col-lg-10 p-md-4">
    <div class="container  mb-3">
        <div class="my-3">
            <a href="/dashboard/kategoris" class="btn btn-success"><span data-feather="arrow-left"></span>Kembali ke Kategori</a>
        </div>

        <div class="row mt-3">
            <div class="col-md-6 border">
                <h1>Kategori {{ $namaKategori->nama }}</h1>
                <table class="table mt-5">
                    <thead>
                        <tr>
                            <th>Nama User</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kategoris as $kategori)
                        <tr>
                            <td>{{ $kategori->nama }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </main>
    <!-- --------------- -->
    @endsection
