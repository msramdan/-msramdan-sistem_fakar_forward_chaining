@extends('layouts.master')
@section('title', 'Data gejala')
@section('content')
    <div class="container-fluid">
        {{ Breadcrumbs::render('gejala_index') }}
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <a href="{{ route('gejala.create') }}" class="btn btn-md btn-success mb-3">TAMBAH</a>
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Kode Gejala</th>
                                        <th>Gejala</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($gejala as $gejala)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $gejala->kd_gejala }}</td>
                                            <td>{{ $gejala->gejala }}</td>
                                            <td>
                                                <a href="{{ route('gejala.edit', $gejala->id) }}"
                                                    class="btn btn-primary btn-xs mb-1" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('gejala.destroy', $gejala->id) }}" method="post"
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
