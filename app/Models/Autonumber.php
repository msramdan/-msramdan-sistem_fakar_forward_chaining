<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Autonumber extends Model
{
    use HasFactory;
    public static function convertdate()
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = date('dmy');
        return $date;
    }

    public static function autonumber($barang, $primary, $prefix)
    {
        $q = DB::table($barang)->select(DB::raw('MAX(RIGHT(' . $primary . ',4)) as kd_max'));
        $prx = $prefix;
        if ($q->count() > 0) {
            foreach ($q->get() as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd = $prx . sprintf("%04s", $tmp);
            }
        } else {
            $kd = $prx . "0001";
        }
        return $kd;
    }
}
