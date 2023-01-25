@extends('layouts.master')
@section('title', 'Data diagnosa')
@section('content')
    <div class="container-fluid">
        {{ Breadcrumbs::render('diagnosa_index') }}
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="card-block">
                            <div class="row">
                                <div class="form-column col-lg-6 col-md-12 col-sm-12">
                                    <center>
                                        <div class="alert alert-primary background-primary">DATA USER
                                        </div>
                                        <table class="table table-sm">

                                            <tbody>
                                                <tr>
                                                    <th style="width: 10%;">Nama</th>
                                                    <td style="width: 1%;">:</td>
                                                    <td>{{ $user->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Email</th>
                                                    <td>:</td>
                                                    <td>{{ $user->email }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">No Hp</th>
                                                    <td>:</td>
                                                    <td>{{ $user->no_hp }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Level</th>
                                                    <td>:</td>
                                                    <td>{{ $user->level }}</td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </center>
                                </div>
                                <div class="form-column col-lg-6 col-md-12 col-sm-12">
                                    <center>
                                        <div class="alert alert-primary background-primary">GEJALA YANG DIRASAKAN
                                        </div>

                                    </center>
                                    <ul style="margin-left: 20px;">
                                        @foreach ($gejala as $g)
                                            <li>{{ namaGejala($g) }} </li>
                                        @endforeach

                                    </ul>
                                </div>
                                <div class="form-column col-lg-6 col-md-12 col-sm-12">
                                    <center>
                                        <div class="alert alert-primary background-primary">PERSENTASE HASIL DIAGNOSA
                                        </div>
                                        <table class="table table-sm">
                                            <tbody>
                                                <tr>
                                                    <th scope="row">#</th>
                                                    <td>Penyakit</td>
                                                    <td>Persentase</td>
                                                </tr>
                                                @foreach ($persentase as $row)
                                                    <tr>
                                                        <th scope="row">{{ $loop->iteration }}</th>
                                                        <td>{{ $row->kd_penyakit }} - {{ $row->penyakit }} </td>
                                                        <td>{{ $row->persentase }} %</td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </center>
                                </div>
                                <div class="form-column col-lg-6 col-md-12 col-sm-12">
                                    <center>
                                        <div class="alert alert-primary background-primary"> KESIMPULAN
                                        </div>
                                    </center>
                                    <p style="text-align: justify;">
                                        Dari proses perhitungan menggunaka
                                        metode bayes di atas, maka dapat
                                        diketahui bahwa penyakit <b> {{ $last[0]->penyakit }}</b> dengan nilai
                                        kemungkinan <b>{{ $last[0]->persentase }} %</b> yang
                                        tertinggi dari penyakit yang lain.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
