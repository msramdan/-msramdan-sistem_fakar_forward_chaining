<?php

namespace App\Http\Controllers;

use App\Models\Diagnosa;
use App\Models\Gejala;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class DiagnosaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\Auth::user()->level == 'Admin') {
            $diagnosa = DB::table('tb_diagnosa')
                ->join('tb_penyakit', 'tb_diagnosa.penyakit_id', '=', 'tb_penyakit.id')
                ->join('users', 'tb_diagnosa.user_id', '=', 'users.id')
                ->select('tb_penyakit.penyakit', 'tb_diagnosa.*', 'users.name')
                ->orderBy('id', 'DESC')
                ->get();
        } else {
            $diagnosa = DB::table('tb_diagnosa')
                ->join('tb_penyakit', 'tb_diagnosa.penyakit_id', '=', 'tb_penyakit.id')
                ->join('users', 'tb_diagnosa.user_id', '=', 'users.id')
                ->select('tb_penyakit.penyakit', 'tb_diagnosa.*', 'users.name')
                ->where('tb_diagnosa.user_id', \Auth::user()->id)
                ->orderBy('id', 'DESC')
                ->get();
        }

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
        DB::table('temp_persentase')->delete();

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

        //3. cari penyakit dari rule yg sesuai dengan gejala
        $sql = "SELECT penyakit_id FROM tb_rule where gejala_id in ('" . $array . "') GROUP by penyakit_id";
        $rule = DB::select($sql);

        foreach ($rule as $value) {
            // 4. ambil data list gejala penyakit, yang ada pada inputan gejala user
            $penyakit = "SELECT * FROM tb_rule where penyakit_id='$value->penyakit_id'";
            $data  = DB::select($penyakit);
            $pro = 0;
            foreach ($data as $rows) {
                if (in_array($rows->gejala_id, $gejala_id)) {
                    $pro = $pro + $rows->nilai;
                    // 5.insert data nilai tiap gejala ke temp_probabilitas point no 1
                    DB::table('temp_probabilitas')->insert([
                        'penyakit_id' => $value->penyakit_id,
                        'gejala_id' => $rows->gejala_id,
                        'nilai' => $rows->nilai,
                    ]);
                }
            }
            //6. update nilai probabilitas pada temp_probabilitas point no 2
            DB::table('temp_probabilitas')
                ->where('penyakit_id', $value->penyakit_id)
                ->update(['probabilitas' => $pro]);
        }
        //7. Get data temp_probabilitas untuk hitung probabilitas_hipotesis
        $hipotesis = "SELECT * FROM temp_probabilitas";
        $fetchHipotesis = DB::select($hipotesis);

        foreach ($fetchHipotesis as $x) {
            // 8. Update value field probabilitas_hipotesis temp_probabilitas point no 3
            DB::table('temp_probabilitas')
                ->where('id', $x->id)
                ->update([
                    'probabilitas_hipotesis' => $x->nilai / $x->probabilitas,
                    'probabilitas_hipotesis_evidence' => $x->nilai * ($x->nilai / $x->probabilitas),
                ]);
        }
        // 9. cari total total_probabilitas_hipotesis_evidence point no 4
        $hipotesisEvidence = "SELECT penyakit_id,SUM(probabilitas_hipotesis_evidence) AS total FROM temp_probabilitas GROUP BY penyakit_id";
        $fetchHipotesisEvidence = DB::select($hipotesisEvidence);
        $arr = array();
        foreach ($fetchHipotesisEvidence as $y) {
            $arr[$y->penyakit_id] = $y->total;
        }

        // 10. mencari nilai Probabilitas Hi point no 5
        $hi = "SELECT * FROM temp_probabilitas";
        $fetchHi = DB::select($hi);

        foreach ($fetchHi as $a) {
            $dataHi = ($a->probabilitas_hipotesis_evidence * $a->nilai) / $arr[$a->penyakit_id];
            DB::table('temp_probabilitas')
                ->where('id', $a->id)
                ->update([
                    'hi' => $dataHi,
                    'kesimpulan' => round($dataHi * $a->nilai, 4),
                ]);
        }
        // 11. hitung persentase
        $persentase = "SELECT penyakit_id,SUM(kesimpulan) AS persentase FROM temp_probabilitas GROUP BY penyakit_id";
        $fetchPersentase = DB::select($persentase);
        $arr = array();
        foreach ($fetchPersentase as $persentase) {
            DB::table('temp_persentase')->insert([
                'penyakit_id' => $persentase->penyakit_id,
                'persentase' => $persentase->persentase * 100,
            ]);
        }

        $hi = "SELECT * FROM temp_persentase join tb_penyakit on tb_penyakit.id = temp_persentase.penyakit_id order by persentase desc";
        $persentaseData = DB::select($hi);
        $top = "SELECT * FROM temp_persentase join tb_penyakit on tb_penyakit.id =temp_persentase.penyakit_id order by persentase desc limit 1";
        $last = DB::select($top);


        // 12. update table diagnosa
        DB::table('tb_diagnosa')
            ->where('id', $insertedId)
            ->update([
                'penyakit_id' => $last[0]->penyakit_id,
                'persentase' => $last[0]->persentase,
            ]);


        return view('diagnosa.show', [
            'user' => \DB::table('users')->where('id', $user_id)->first(),
            'persentase' => $persentaseData,
            'last' => $last,
            'gejala' => $gejala_id
        ]);
    }


    public function destroy(Diagnosa $diagnosa)
    {
        DB::beginTransaction();
        try {
            $diagnosa->delete();
            Alert::toast('Data berhasil dihapus', 'success');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::toast('Data gagal dihapus', 'error');
        } finally {
            DB::commit();
            return redirect()->back();
        }
    }
}
