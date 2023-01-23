@extends('layouts.master')
@section('title', 'Data diagnosa')
@section('content')
    <div class="container-fluid">
        {{ Breadcrumbs::render('diagnosa_index') }}
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <a href="{{ route('diagnosa.create') }}" class="btn btn-md btn-success mb-3">Export Ms Excel</a>
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User</th>
                                        <th>Penyakit</th>
                                        <th>Gejala</th>
                                        <th>Persentase</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($diagnosa as $diagnosa)
                                        {{-- <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $diagnosa->kd_diagnosa }}</td>
                                            <td>{{ $diagnosa->diagnosa }}</td>
                                            <td>{{ $diagnosa->keterangan }}</td>
                                            <td>{{ $diagnosa->solusi }}</td>
                                            <td>
                                                <a href="{{ route('diagnosa.edit', $diagnosa->id) }}"
                                                    class="btn btn-primary btn-xs mb-1" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('diagnosa.destroy', $diagnosa->id) }}" method="post"
                                                    class="d-inline"
                                                    onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger btn-xs mb-1" title="Hapus">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr> --}}
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
