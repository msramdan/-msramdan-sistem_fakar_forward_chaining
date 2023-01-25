<?php

namespace App\Exports;

use App\Models\Diagnosa;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;

class DiagnosaExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $data = DB::table('tb_diagnosa')
            ->join('tb_penyakit', 'tb_diagnosa.penyakit_id', '=', 'tb_penyakit.id')
            ->join('users', 'tb_diagnosa.user_id', '=', 'users.id')
            ->select('tb_penyakit.penyakit', 'tb_diagnosa.*', 'users.name')
            ->orderBy('id', 'DESC')
            ->get();
        return view('diagnosa.export', [
            'data' => $data
        ]);
    }
}
