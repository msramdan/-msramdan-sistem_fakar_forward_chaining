@extends('layouts.master')
@section('title', 'Tambah diagnosa')
@section('content')
    <div class="container-fluid">
        {{ Breadcrumbs::render('diagnosa-tambah') }}
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="form-column col-lg-6 col-md-12 col-sm-12 offset-md-3">
                            <center>
                                <div class="alert alert-primary background-primary">
                                    SISTEM PAKAR DIAGNOSIS GANGGUAN KESEHATAN MENTAL
                                    MENGGUNAKAN METODE TEOREMA BAYES
                                </div>
                            </center>
                        </div>
                        <div class="form-column col-lg-12 col-md-12 col-sm-12">
                            <form action="{{ route('diagnosa.store') }}" method="POST">
                                @csrf
                                @if (Auth::user()->level == 'Admin')
                                    <div class="form-group col-md-6  offset-md-3">
                                        <div class=" form-group">
                                            <select name="user_id" class="form-control" required="">
                                                <option value=""> -- Pilih User -- </option>
                                                @foreach ($user as $row)
                                                    <option value="{{ $row->id }}"> {{ $row->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @else
                                    <input type="hidden" readonly class="form-control" name="user_id"
                                        value="{{ Auth::user()->id }}">
                                @endif

                                <div class="row">
                                    @foreach ($gejala as $data)
                                        <div class="form-group col-md-6" style="margin-bottom: -10px">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <input type="checkbox" name="gejala_id[]" value="<?= $data->id ?>">
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control"
                                                    placeholder="{{ $data->kd_gejala }} - {{ $data->gejala }}"
                                                    aria-label="" readonly>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="form-group" style="margin-top: 5px;float:right">
                                    <button disabled="disabled" id="submit" type="submit" class="btn btn-danger"><i
                                            class="fa fa-refresh" aria-hidden="true"></i> Proses</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            var tmp = [];
            $("input[type='checkbox']").change(function() {
                var checked = $(this).val();
                if ($(this).is(':checked')) {
                    tmp.push(checked);
                } else {
                    tmp.splice($.inArray(checked, tmp), 1);
                }
                var res = tmp.length;
                // console.log(res);
                if (res > 0) {
                    $('#submit').prop('disabled', false);
                } else if (res == 0) {
                    $('#submit').prop('disabled', true);
                }
            });
        });
    </script>
@endpush
