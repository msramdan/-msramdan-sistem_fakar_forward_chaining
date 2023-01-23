@extends('layouts.master')
@section('title', 'Tambah rule')
@section('content')
    <div class="container-fluid">
        {{ Breadcrumbs::render('rule-tambah') }}
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="form-group ">
                            <a href="{{ route('rule.index') }}" class="btn btn-warning" style="float: right"><i
                                    class="fa fa-arrow-left"></i> Back</a>
                        </div>
                        <div class="col-md-6">
                            <form method="POST" action="{{ route('rule.store') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="kd_rule">Kode rule</label>
                                    <input class="form-control @error('kd_rule') is-invalid @enderror" id="kd_rule"
                                        type="text" value="{{ $kodeBarang }}" placeholder="Kode rule" name="kd_rule"
                                        autocomplete="off" readonly>
                                    @error('kd_rule')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="rule">rule</label>
                                    <input class="form-control @error('rule') is-invalid @enderror" id="rule"
                                        type="rule" value="{{ old('rule') }}" placeholder="" name="rule"
                                        autocomplete="off">
                                    @error('rule')
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
