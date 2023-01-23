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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Diagnosa  $diagnosa
     * @return \Illuminate\Http\Response
     */
    public function show(Diagnosa $diagnosa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Diagnosa  $diagnosa
     * @return \Illuminate\Http\Response
     */
    public function edit(Diagnosa $diagnosa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Diagnosa  $diagnosa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Diagnosa $diagnosa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Diagnosa  $diagnosa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diagnosa $diagnosa)
    {
        //
    }
}
