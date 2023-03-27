<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use PDF;
use Illuminate\Support\Facades\Hash;

class StatusController extends Controller
{
    public function index()
    {
        $statuss = Pengaduan::where('status', 'proses')->orderBy('tgl_pengaduan', 'desc')->get();
        return view('Admin.Status.index',['status' => $statuss]);
    }

    public function cetak()
    {
        $pengaduans = Pengaduan::where('status', 'proses')->get();

        $pdff = PDF::loadView('Admin.Status.cetak', ['pengaduan' => $pengaduans]);
        return $pdff->download('laporan-pengaduan.pdf');
    }
}