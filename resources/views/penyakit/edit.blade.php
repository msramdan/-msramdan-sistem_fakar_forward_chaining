@extends('layouts.master')
@section('title', 'Edit Penyakit')
@section('content')
    <div class="container-fluid">
        {{ Breadcrumbs::render('penyakit-edit', $penyakit) }}
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="form-group ">
                            <a href="{{ route('penyakit.index') }}" class="btn btn-warning" style="float: right"><i
                                    class="fa fa-arrow-left"></i> Back</a>
                        </div>
                        <div class="col-md-6">
                            <form method="POST" action="{{ route('penyakit.update', $penyakit->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="kd_penyakit">Kode Penyakit</label>
                                    <input class="form-control @error('kd_penyakit') is-invalid @enderror" id="kd_penyakit"
                                        type="text"
                                        value="{{ old('kd_penyakit') ? old('kd_penyakit') : $penyakit->kd_penyakit }}"
                                        placeholder="Kode penyakit" name="kd_penyakit" autocomplete="off" readonly>
                                    @error('kd_penyakit')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="penyakit">Penyakit</label>
                                    <input class="form-control @error('penyakit') is-invalid @enderror" id="penyakit"
                                        type="penyakit"
                                        value="{{ old('penyakit') ? old('penyakit') : $penyakit->penyakit }}" placeholder=""
                                        name="penyakit" autocomplete="off">
                                    @error('penyakit')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan"
                                        cols="30" rows="10" autocomplete="off">{{ old('keterangan') ? old('keterangan') : $penyakit->keterangan }}</textarea>
                                    @error('keterangan')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="solusi">Solusi</label>
                                    <textarea name="solusi" class="form-control @error('solusi') is-invalid @enderror" id="solusi" cols="30"
                                        rows="10" autocomplete="off">{{ old('solusi') ? old('solusi') : $penyakit->solusi }}</textarea>
                                    @error('solusi')
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
