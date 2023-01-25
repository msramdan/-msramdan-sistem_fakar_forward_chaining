<?php

use Illuminate\Support\Facades\DB;

if (!function_exists('set_active')) {
    function set_active($uri)
    {
        if (is_array($uri)) {
            foreach ($uri as $u) {
                if (Route::is($u)) { // jika route sekarang sama dengan variable u
                    return 'active';
                }
            }
        } else {
            if (Route::is($uri)) { // jika route sekarang sama dengan variable u
                return 'active';
            }
        }
        // return request()->routeIs($uri) ? 'active' : '';
    }
}



function namaGejala($gejala_id)
{
    $gejala = DB::table('tb_gejala')->where('id', $gejala_id)->first();
    return $gejala->gejala;
}

function namaKdGejala($gejala_id)
{
    $gejala = DB::table('tb_gejala')->where('id', $gejala_id)->first();
    return $gejala->kd_gejala;
}
