@extends('layouts.master')
@section('title', 'Edit Gejala')
@section('content')
    <div class="container-fluid">
        {{ Breadcrumbs::render('gejala-edit', $gejala) }}
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="form-group ">
                            <a href="{{ route('gejala.index') }}" class="btn btn-warning" style="float: right"><i
                                    class="fa fa-arrow-left"></i> Back</a>
                        </div>
                        <div class="col-md-6">
                            <form method="POST" action="{{ route('gejala.update', $gejala->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="kd_gejala">Kode Gejala</label>
                                    <input class="form-control @error('kd_gejala') is-invalid @enderror" id="kd_gejala"
                                        type="text"
                                        value="{{ old('kd_gejala') ? old('kd_gejala') : $gejala->kd_gejala }}"
                                        placeholder="Kode Gejala" name="kd_gejala" autocomplete="off" readonly>
                                    @error('kd_gejala')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="gejala">Gejala</label>
                                    <input class="form-control @error('gejala') is-invalid @enderror" id="gejala"
                                        type="gejala" value="{{ old('gejala') ? old('gejala') : $gejala->gejala }}"
                                        placeholder="" name="gejala" autocomplete="off">
                                    @error('gejala')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"
                                            aria-hidden="true"></i> SIMPAN</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
