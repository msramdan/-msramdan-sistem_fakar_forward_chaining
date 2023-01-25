<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        return view('home.index', [
            'user' => \DB::table('users')->count(),
            'gejala' => \DB::table('tb_gejala')->count(),
            'penyakit' => \DB::table('tb_penyakit')->count(),
            'diagnosa' => \DB::table('tb_diagnosa')->count(),

        ]);
    }
}
