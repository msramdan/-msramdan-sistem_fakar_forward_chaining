<?php

namespace App\Http\Controllers;

use App\Models\Diagnosa;
use App\Models\Gejala;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DiagnosaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diagnosa = DB::table('tb_diagnosa')
            ->join('tb_penyakit', 'tb_diagnosa.penyakit_id', '=', 'tb_penyakit.id')
            ->join('users', 'tb_diagnosa.user_id', '=', 'users.id')
            ->select('tb_penyakit.penyakit', 'tb_diagnosa.*', 'users.name')
            ->groupBy('tb_diagnosa.penyakit_id')
            ->get();
        return view('diagnosa.index', compact('diagnosa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user =  User::all();
        $gejala =  Gejala::all();
        return view('diagnosa.add', compact('user', 'gejala'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('temp_probabilitas')->delete();
        DB::table('temp_probabilitas_gejala')->delete();
        DB::table('temp_total')->delete();

        //1. tampung data inputan
        $gejala_id            = $_POST['gejala_id'];
        $array                 = implode("','", $gejala_id);
        $user_id            = $_POST['user_id'];
        // 2. insert data diagnosa
        DB::table('tb_diagnosa')->insert([
            'user_id' => $user_id,
            'gejala_id' => json_encode($gejala_id),
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        $insertedId = DB::getPdo()->lastInsertId();

        //3. cari penyakit dari rule yg sesuaidengan gejala
        $sql = "SELECT penyakit_id FROM tb_rule where gejala_id in ('" . $array . "') GROUP by penyakit_id";
        $rule = DB::select($sql);
        $cekJmlAkibat = DB::table("tb_rule")
            ->whereIn('gejala_id', [$array])
            ->groupBy('penyakit_id')
            ->get();
        $ganguanAkibatGejala = $cekJmlAkibat->count();

        // ===== hitung probabilitas setiap penyakit ==============
        // 4. hitung jumlah penyakit pada basis pengetahuan
        $jmlAllKasus = DB::table("tb_rule")
            ->groupBy('penyakit_id')
            ->count();

        // 5. probabilitas setiap penyakit
        foreach ($rule as $value) {
            $peluangPenyakit = DB::query("SELECT * from tb_rule where penyakit_id='$value->penyakit_id'")
                ->count();
            //6. insert temp_probabilitas
            $pro = $peluangPenyakit / $jmlAllKasus;
            DB::table('temp_probabilitas')->insert([
                'penyakit_id' => $value->penyakit_id,
                'probabilitas' => $pro,
            ]);


            //7. insert temp_probabilitas_gejala
            foreach ($gejala_id as $row) {
                // cek di penyakit(kd_penyakit) ada tidak gejala ini
                $a = DB::table("tb_rule")
                    ->where('penyakit_id', $value->penyakit_id)
                    ->where('gejala_id', $row)
                    ->get();
                $cekJml = $a->count();
                $nilai  = $cekJml / $ganguanAkibatGejala;

                DB::table('temp_probabilitas_gejala')->insert([
                    'penyakit_id' => $value->penyakit_id,
                    'gejala_id' => $row,
                    'pembilang' => $cekJml,
                    'penyebut' => $ganguanAkibatGejala,
                    'nilai' =>  $nilai,
                ]);
            }
        }
        // hitung Naïve Bayes setiap Penyakit P(P00X|G00X)
        $temp_pro = DB::table("temp_probabilitas")
            ->get();

        foreach ($temp_pro as $value) {
            $total = 0;
            foreach ($gejala_id as $data) {
                $pembilang = self::pembilang($value->penyakit_id, $data);
                $penyebut = self::penyebut($data);
                $total = $total + ($pembilang / $penyebut);
            }

            DB::table('temp_total')->insert([
                'penyakit_id' => $value->penyakit_id,
                'total' =>  $total,
            ]);
        }

        dd($temp_pro);
    }

    function pembilang($penyakit_id, $gejala_id)
    {
        $data =  DB::table('temp_probabilitas_gejala')
            ->join('temp_probabilitas', 'temp_probabilitas_gejala.penyakit_id', '=', 'temp_probabilitas.penyakit_id')
            ->where('gejala_id', $gejala_id)
            ->where('temp_probabilitas_gejala.penyakit_id', $penyakit_id)
            ->first();
        return $data->nilai * $data->probabilitas;
    }

    function penyebut($gejala_id)
    {
        $data = DB::table('temp_probabilitas_gejala')
            ->join('temp_probabilitas', 'temp_probabilitas_gejala.penyakit_id', '=', 'temp_probabilitas.penyakit_id')
            ->where('gejala_id', $gejala_id)
            ->get();

        $nilaiTotal = 0;
        foreach ($data as $value) {
            $nilaiTotal = $nilaiTotal + ($value->nilai * $value->probabilitas);
        }
        return $nilaiTotal;
    }



    public function destroy(Diagnosa $diagnosa)
    {
        //
    }
}
