<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\Penjualan;
use App\Models\Penggajian;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $bulan = $request->input('bulan', now()->format('Y-m'));
        $model = $request->input('model');

        $pembelian = null;
        $penjualan = null;
        $penggajian = null;

        if ($model === 'pembelian') {
            $pembelian = Pembelian::whereMonth('tanggal', Carbon::parse($bulan)->month)
                ->whereYear('tanggal', Carbon::parse($bulan)->year)
                ->get();
        } elseif ($model === 'penjualan') {
            $penjualan = Penjualan::whereMonth('tanggal', Carbon::parse($bulan)->month)
                ->whereYear('tanggal', Carbon::parse($bulan)->year)
                ->get();
        } elseif ($model === 'penggajian') {
            $penggajian = Penggajian::where('status', 'Sudah Dibayar')
                ->where('bulan', $bulan)
                ->get();
        }

        // Menghitung total untuk masing-masing jika ada data
        $totalPembelian = $pembelian ? $pembelian->sum('total') : 0;
        $totalPenjualan = $penjualan ? $penjualan->sum('total') : 0;
        $totalPenggajian = $penggajian ? $penggajian->sum('jumlah') : 0;

        return view('pageadmin.laporan.index', compact(
            'pembelian',
            'penjualan',
            'penggajian',
            'bulan',
            'totalPembelian',
            'totalPenjualan',
            'totalPenggajian',
            'model'
        ));
    }
}
