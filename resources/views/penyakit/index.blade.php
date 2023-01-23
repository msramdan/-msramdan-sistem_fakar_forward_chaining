@extends('layouts.master')
@section('title', 'Data Penyakit')
@section('content')
    <div class="container-fluid">
        {{ Breadcrumbs::render('penyakit_index') }}
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <a href="{{ route('penyakit.create') }}" class="btn btn-md btn-success mb-3">TAMBAH</a>
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Kode Penyakit</th>
                                        <th>Penyakit</th>
                                        <th>Keterangan</th>
                                        <th>Solusi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($penyakit as $penyakit)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $penyakit->kd_penyakit }}</td>
                                            <td>{{ $penyakit->penyakit }}</td>
                                            <td>{{ $penyakit->keterangan }}</td>
                                            <td>{{ $penyakit->solusi }}</td>
                                            <td>
                                                <a href="{{ route('penyakit.edit', $penyakit->id) }}"
                                                    class="btn btn-primary btn-xs mb-1" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('penyakit.destroy', $penyakit->id) }}" method="post"
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
