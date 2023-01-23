@extends('layouts.master')
@section('title', 'Tambah rule')
@section('content')
    <div class="container-fluid">
        {{ Breadcrumbs::render('rule-tambah') }}
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form action="{{ route('rule.store') }}" method="post">
                            @csrf
                            <table id="data-table-default" class="table  table-bordered table-hover table-td-valign-middle">
                                <tbody>
                                    <tr>
                                        <td>Penyakit </td>
                                        <td>
                                            <select name="penyakit_id" id="penyakit_id" class="form-control" required="">
                                                <option value="">-- Pilih --</option>
                                                @foreach ($penyakit as $data)
                                                    <option value="{{ $data->id }}">{{ $data->kd_penyakit }} -
                                                        {{ $data->penyakit }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table> <br>
                            <div class="alert alert-primary" role="alert">
                                <h5>Input Nilai Data Rule / Basis Kasus</h5>
                            </div>
                            <div class="form-row">

                                @foreach ($gejala as $row)
                                    <div class="form-group col-md-6">
                                        <label for="">{{ $row->kd_gejala }} - {{ $row->gejala }}</label>
                                        <input type="number" step=0.01 max="1" min="0.1" value=""
                                            name="nilai[]" class="form-control">
                                        <input type="hidden" readonly="" value="{{ $row->id }}" name="gejala_id[]"
                                            class="form-control" id="" placeholder="">
                                    </div>
                                @endforeach
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"
                                            aria-hidden="true"></i> SIMPAN</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
