@extends('layouts.master')
@section('title', 'Edit User')
@section('content')
    <div class="container-fluid">
        {{ Breadcrumbs::render('user-edit', $user) }}
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="form-group ">
                            <a href="{{ route('user.index') }}" class="btn btn-warning" style="float: right"><i
                                    class="fa fa-arrow-left"></i> Back</a>
                        </div>
                        <div class="col-md-6">
                            <form method="POST" action="{{ route('user.update', $user->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="name">Nama</label>
                                    <input class="form-control @error('name') is-invalid @enderror" id="name"
                                        type="text" value="{{ old('name') ? old('name') : $user->name }}"
                                        placeholder="Nama" name="name" autocomplete="off">
                                    @error('name')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email">Email</label>
                                    <input class="form-control @error('email') is-invalid @enderror" id="email"
                                        type="email" value="{{ old('email') ? old('email') : $user->email }}"
                                        placeholder="Email" name="email" autocomplete="off">
                                    @error('email')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="no_hp">No Hp</label>
                                    <input class="form-control @error('no_hp') is-invalid @enderror" id="no_hp"
                                        type="text" value="{{ old('no_hp') ? old('no_hp') : $user->no_hp }}"
                                        placeholder="No Hp" name="no_hp" autocomplete="off">
                                    @error('no_hp')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password">Password</label>
                                    <input class="form-control @error('password') is-invalid @enderror" id="password"
                                        type="password" value="{{ old('password') }}" placeholder="Password"
                                        name="password">
                                    <span style="color: red">*kosongkan jika tidak ingin merubah password</span>
                                    @error('password')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="">Konfirmasi Password</label>
                                    <input class="form-control @error('password') is-invalid @enderror" id=""
                                        type="password" value="{{ old('password_confirmation') }}"
                                        placeholder="Konfirmasi Password" name="password_confirmation">
                                    @error('password')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="level">Level User</label>
                                    <select name="level" class="form-control  @error('level') is-invalid @enderror"
                                        id="level">
                                        <option value="">-- Pilih --</option>
                                        <option value="Admin" {{ old('level') == 'Admin' ? 'selected' : '' }}
                                            {{ $user->level == 'Admin' ? 'selected' : '' }}>
                                            Admin</option>
                                        <option value="User" {{ old('level') == 'User' ? 'selected' : '' }}
                                            {{ $user->level == 'User' ? 'selected' : '' }}>
                                            User</option>
                                    </select>
                                    </select>
                                    @error('level')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <button type="submit" class="btn btn-sm btn-primary">SIMPAN</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
@endpush

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#select2-component').select2();
        });
    </script>
@endpush
