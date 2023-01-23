@extends('layouts.master')
@section('title', 'Data rule')
@section('content')
    <div class="container-fluid">
        {{ Breadcrumbs::render('rule_index') }}
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <a href="{{ route('rule.create') }}" class="btn btn-md btn-success mb-3">TAMBAH</a>
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Penyakit</th>
                                        <th>Gejala - Nilai</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rule as $rule)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $rule->penyakit }}</td>
                                            @php
                                                $gejala = DB::table('tb_rule')
                                                    ->join('tb_gejala', 'tb_rule.gejala_id', '=', 'tb_gejala.id')
                                                    ->select('tb_gejala.gejala', 'tb_rule.nilai')
                                                    ->where('tb_rule.penyakit_id', $rule->penyakit_id)
                                                    ->get();

                                            @endphp
                                            <td>
                                                @foreach ($gejala as $row)
                                                    {{ $row->gejala }} - <b>{{ $row->nilai }}</b> <br>
                                                @endforeach
                                            </td>
                                            <td>
                                                <a href="{{ route('rule.edit', $rule->id) }}"
                                                    class="btn btn-primary btn-xs mb-1" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('rule.destroy', $rule->id) }}" method="post"
                                                    class="d-inline"
                                                    onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger btn-xs mb-1" title="Hapus">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
