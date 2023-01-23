<?php

namespace App\Http\Controllers;

use App\Models\Autonumber;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Penyakit;
use Illuminate\Http\Request;

class PenyakitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penyakit = Penyakit::orderBy('id', 'DESC')->get();
        return view('penyakit.index', compact('penyakit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $table = "tb_penyakit";
        $primary = "kd_penyakit";
        $prefix = "P";
        $kodePenyakit = Autonumber::autonumber($table, $primary, $prefix);
        return view('penyakit.add', compact('kodePenyakit'));
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
                'kd_penyakit' => "required|string|unique:tb_penyakit,kd_penyakit",
                'penyakit' => "required|string",
                'keterangan' => "required|string",
                'solusi' => "required|string",
            ],
        );
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        try {
            Penyakit::create([
                'kd_penyakit'   => $request->kd_penyakit,
                'penyakit'   => $request->penyakit,
                'keterangan'   => $request->keterangan,
                'solusi'   => $request->solusi,
            ]);
            Alert::toast('Data berhasil disimpan', 'success');
            return redirect()->route('penyakit.index');
        } catch (\Throwable $th) {
            Alert::toast('Data gagal disimpan', 'error');
            return redirect()->route('penyakit.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penyakit  $penyakit
     * @return \Illuminate\Http\Response
     */
    public function show(Penyakit $penyakit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penyakit  $penyakit
     * @return \Illuminate\Http\Response
     */
    public function edit(Penyakit $penyakit)
    {
        return view('penyakit.edit', [
            'penyakit' => $penyakit,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penyakit  $penyakit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penyakit $penyakit)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'kd_penyakit' => "required|unique:tb_penyakit,kd_penyakit, " . $penyakit->id,
                'penyakit' => "required",
                'keterangan' => "required",
                'solusi' => "required",
            ],
        );
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        try {
            $penyakit = Penyakit::findOrFail($penyakit->id);
            $penyakit->update([
                'penyakit'   => $request->penyakit,
                'keterangan'   => $request->keterangan,
                'solusi'   => $request->solusi,
            ]);
            Alert::toast('Data berhasil diupdate', 'success');
            return redirect()->route('penyakit.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::toast('Data gagal diupdate', 'error');
            return redirect()->route('penyakit.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penyakit  $penyakit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penyakit $penyakit)
    {
        DB::beginTransaction();
        try {
            $penyakit->delete();
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
