@extends('layouts.auth')
@section('title', 'Login')
@section('content')
    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">Halaman Registrasi</h1>
    </div>
    <form class="user" method="POST" action="{{ route('daftar-akun') }}">
        @csrf
        <div class="form-group">
            <input id="name" type="text" class="form-control form-control-user @error('name') is-invalid @enderror"
                name="name" value="{{ old('name') }}" autocomplete="name" autofocus placeholder="Nama">

            @error('name')
                <center><span style="color: red;">{{ $message }}</span></center>
            @enderror
        </div>
        <div class="form-group">
            <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror"
                name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Email">

            @error('email')
                <center><span style="color: red;">{{ $message }}</span></center>
            @enderror
        </div>

        <div class="form-group">
            <input id="no_hp" type="text" class="form-control form-control-user @error('no_hp') is-invalid @enderror"
                name="no_hp" value="{{ old('no_hp') }}" autocomplete="no_hp" autofocus placeholder="No Hp">

            @error('no_hp')
                <center><span style="color: red;">{{ $message }}</span></center>
            @enderror
        </div>

        <div class="form-group">
            <input id="password" type="password"
                class="form-control form-control-user @error('password') is-invalid @enderror" name="password"
                autocomplete="new-password" placeholder="Password">

            @error('password')
                <center><span style="color: red;">{{ $message }}</span></center>
            @enderror
        </div>
        <div class="form-group">
            <input id="password-confirm" type="password" class="form-control form-control-user"
                placeholder="{{ __('Confirm Password') }}" name="password_confirmation" autocomplete="new-password">
        </div>


        <button type="submit" class="btn btn-primary btn-user btn-block">
            {{ __('Register') }}
        </button>
    </form>

    <br>
    <div class="text-center">
        <a class="small" href="{{ route('panel-login') }}">Sudah memiliki akun ? Klik Login</a>
    </div>
@endsection
