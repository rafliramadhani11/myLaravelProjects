@extends('layouts.main')

@section('content')
    <div class="row w-50 mx-auto">
        <div class="col-md-7 mx-auto">
            <form class="mt-5" action="{{ route('store') }}" method="post">
                @csrf

                <h1 class="text-center mb-4">Register</h1>
                <div class="mb-3 form-floating">
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" autofocus>
                    <label for="name">Email</label>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3 form-floating">
                    <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Name" value="{{ old('nama') }}" >
                    <label for="nama">Nama</label>
                    @error('nama')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3 form-floating">
                    <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" placeholder="Username" >
                    <label for="username">Username</label>
                    @error('username')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-2 form-floating">
                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror"  placeholder="Password" >
                    <label for="password">Password</label>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <small>
                    Already Have Account ? <a href="{{ route('login') }}">Login</a>
                </small>
                <button type="submit" class="btn btn-primary d-block mt-3">Register</button>
            </form>
        </div>
    </div>
@endsection
