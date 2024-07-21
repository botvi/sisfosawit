<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Pembelian;
use App\Models\Penjualan;
use App\Models\Penggajian;
use App\Models\GajiKaryawan;
use Illuminate\Http\Request;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class PenggajianController extends Controller
{
    public function index()
    {
        $bulan = Carbon::now()->format('Y-m');
        $karyawansTukangMuat = Karyawan::where('jabatan', 'Tukang Muat')->get();
        $karyawansSupir = Karyawan::where('jabatan', 'Supir')->get();
        $karyawansPencatat = Karyawan::where('jabatan', 'Pencatat')->get();
        return view('pageadmin.penggajian.index', compact('karyawansTukangMuat', 'karyawansSupir', 'karyawansPencatat', 'bulan'));
    }

    public function cekGaji(Request $request)
    {
        $bulan = now()->format('Y-m');
        $jabatan = $request->jabatan;
        $karyawans = Karyawan::where('jabatan', $jabatan)->get();
        
        $gajiKaryawan = [];
        foreach ($karyawans as $karyawan) {
            $gajiKaryawanModel = GajiKaryawan::where('karyawan_id', $karyawan->id)->first();
            $jumlah_gaji = $gajiKaryawanModel ? $gajiKaryawanModel->jumlah_gaji : 0;
            
            if ($jabatan === 'Tukang Muat') {
                $totalKilo = Pembelian::where('karyawan_id', 'like', '%' . $karyawan->id . '%')
                    ->whereMonth('tanggal', now()->month)
                    ->whereYear('tanggal', now()->year)
                    ->sum('jumlah_kilo');
                $gaji = floor($totalKilo / 1000) * $jumlah_gaji;
            } else if ($jabatan === 'Supir') {
                $totalPenjualan = Penjualan::where('karyawan_id', 'like', '%' . $karyawan->id . '%')
                    ->whereMonth('tanggal', now()->month)
                    ->whereYear('tanggal', now()->year)
                    ->count();
                $gaji = $totalPenjualan * $jumlah_gaji;
            } else if ($jabatan === 'Pencatat') {
                $gaji = $jumlah_gaji;
            }

            $penggajian = Penggajian::where('karyawan_id', $karyawan->id)
                ->where('bulan', $bulan)
                ->first();

            if (!$penggajian) {
                $penggajian = Penggajian::create([
                    'karyawan_id' => $karyawan->id,
                    'jumlah' => $gaji,
                    'bulan' => $bulan,
                    'status' => 'Belum Dibayar'
                ]);
            } else {
                $penggajian->update(['jumlah' => $gaji]);
            }

            $gajiKaryawan[$karyawan->id] = [
                'nama' => $karyawan->nama,
                'gaji' => $gaji,
                'status' => $penggajian->status
            ];
        }

        return view('pageadmin.penggajian.result', compact('gajiKaryawan', 'bulan', 'jabatan'));
    }

    public function updateStatus(Request $request)
    {
        $bulan = now()->format('Y-m');
        $penggajian = Penggajian::where('karyawan_id', $request->karyawan_id)
            ->where('bulan', $bulan)
            ->first();

        if ($penggajian) {
            $penggajian->update(['status' => 'Sudah Dibayar']);
        }

        Alert::success('Berhasil', 'Status gaji berhasil diperbarui.');

        return redirect()->route('penggajian.index');
    }
}
