<?php

namespace App\Http\Controllers;

use App\Models\Donasi;
use App\Models\pengeluaran;
use Illuminate\Http\Request;

class laporanController extends Controller
{
    public function donasimasuk()
    {
        $data['data'] = Donasi::where('status', '=', 'success')->get();
        return view('zakat.donasimasuk', $data);
    }

    public function donasikeluar()
    {
        $data['data'] = pengeluaran::get();
        return view('zakat.donasikeluar', $data);
    }
}
