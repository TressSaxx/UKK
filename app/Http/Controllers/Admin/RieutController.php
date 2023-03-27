<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use PDF;
use Illuminate\Support\Facades\Hash;

class RieutController extends Controller
{
    public function index()
    {
        $rieut = Pengaduan::where('status', 'selesai')->orderBy('tgl_pengaduan', 'desc')->get();
        return view('Admin.Rieut.index',['status' => $rieut]);
    }

    public function cetak()
    {
        $pengaduan = Pengaduan::where('status', 'selesai')->get();

        $pdf = PDF::loadView('Admin.Rieut.cetak', ['pengaduan' => $pengaduan]);
        return $pdf->download('laporan-pengaduan.pdf');
    }
}