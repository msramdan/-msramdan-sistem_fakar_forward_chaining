<?php

namespace App\Http\Controllers;

use App\Models\Autonumber;
use App\Models\Gejala;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class GejalaController extends Controller
{


    public function index()
    {
        $gejala = Gejala::orderBy('id', 'DESC')->get();
        return view('gejala.index', compact('gejala'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $table = "tb_gejala";
        $primary = "kd_gejala";
        $prefix = "G";
        $kodeBarang = Autonumber::autonumber($table, $primary, $prefix);
        return view('gejala.add', compact('kodeBarang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'kd_gejala' => "required|string|unique:tb_gejala,kd_gejala",
                'gejala' => "required",
            ],
        );
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        try {
            Gejala::create([
                'kd_gejala'   => $request->kd_gejala,
                'gejala'   => $request->gejala,
            ]);
            Alert::toast('Data berhasil disimpan', 'success');
            return redirect()->route('gejala.index');
        } catch (\Throwable $th) {
            Alert::toast('Data gagal disimpan', 'error');
            return redirect()->route('gejala.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gejala  $gejala
     * @return \Illuminate\Http\Response
     */
    public function show(Gejala $gejala)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gejala  $gejala
     * @return \Illuminate\Http\Response
     */
    public function edit(Gejala $gejala)
    {
        return view('gejala.edit', [
            'gejala' => $gejala,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gejala  $gejala
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gejala $gejala)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'kd_gejala' => "required|unique:tb_gejala,kd_gejala, " . $gejala->id,
                'gejala' => "required",
            ],
        );
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        try {
            $gejala = Gejala::findOrFail($gejala->id);
            $gejala->update([
                'gejala'   => $request->gejala,
            ]);
            Alert::toast('Data berhasil diupdate', 'success');
            return redirect()->route('gejala.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::toast('Data gagal diupdate', 'error');
            return redirect()->route('gejala.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gejala  $gejala
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gejala $gejala)
    {
        DB::beginTransaction();
        try {
            $gejala->delete();
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
