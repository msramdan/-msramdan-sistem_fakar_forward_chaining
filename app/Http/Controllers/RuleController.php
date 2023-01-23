<?php

namespace App\Http\Controllers;

use App\Models\Penyakit;
use App\Models\Gejala;
use App\Models\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class RuleController extends Controller
{

    public function index()
    {
        $rule = DB::table('tb_rule')
            ->join('tb_penyakit', 'tb_rule.penyakit_id', '=', 'tb_penyakit.id')
            ->select('tb_penyakit.penyakit', 'tb_rule.*')
            ->groupBy('tb_rule.penyakit_id')
            ->get();
        return view('rule.index', compact('rule'));
    }

    public function create()
    {
        $penyakit =
            DB::table('tb_penyakit')
            ->leftJoin('tb_rule', 'tb_rule.penyakit_id', '=', 'tb_penyakit.id')
            ->select('tb_penyakit.*')
            ->whereNull('tb_rule.id')
            ->get();
        $gejala =  Gejala::all();
        return view('rule.add', compact('penyakit', 'gejala'));
    }

    public function store(Request $request)
    {
        $nilai               = $_POST['nilai'];
        $penyakit_id       = $_POST['penyakit_id'];
        $gejala_id       = $request->gejala_id;
        $jumlah_data = count($gejala_id);
        for ($i = 0; $i < $jumlah_data; $i++) {
            $fix_gejala = $gejala_id[$i];
            $fix_nilai = $nilai[$i];
            if ($fix_nilai != null || $fix_nilai > 0) {
                DB::table('tb_rule')->insert([
                    'penyakit_id' => $penyakit_id,
                    'gejala_id' => $fix_gejala,
                    'nilai' => $fix_nilai,

                ]);
            }
        }
        Alert::toast('Data berhasil disimpan', 'success');
        return redirect()->route('rule.index');
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            DB::table('tb_rule')->where('penyakit_id', $id)->delete();
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
