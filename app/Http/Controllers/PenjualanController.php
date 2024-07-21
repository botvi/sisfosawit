<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Karyawan;
use App\Models\HargaJual;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualans = Penjualan::all();
        return view('pageadmin.penjualan.index', compact('penjualans'));
    }

    public function create()
    {
        $karyawans = Karyawan::where('jabatan', 'Supir')->get();
        $hargaJuals = HargaJual::all();
        return view('pageadmin.penjualan.create', compact('karyawans', 'hargaJuals'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id',
            'tanggal' => 'required|date',
            'jumlah_kilo' => 'required|numeric',
            'harga_jual_id' => 'required|exists:harga_juals,id',
            'total' => 'required|numeric',
        ]);

        $hargaJual = HargaJual::findOrFail($request->harga_jual_id);
        $total = $request->jumlah_kilo * $hargaJual->harga;

        Penjualan::create(array_merge($request->all(), ['total' => $total]));

        Alert::success('Success', 'Penjualan created successfully.');
        return redirect()->route('penjualan.index');
    }

    public function edit($id)
    {
        $penjualan = Penjualan::findOrFail($id);
        $karyawans = Karyawan::where('jabatan', 'Supir')->get();
        $hargaJuals = HargaJual::all();
        return view('pageadmin.penjualan.edit', compact('penjualan', 'karyawans', 'hargaJuals'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id',
            'tanggal' => 'required|date',
            'jumlah_kilo' => 'required|numeric',
            'harga_jual_id' => 'required|exists:harga_juals,id',
            'total' => 'required|numeric',
        ]);

        $penjualan = Penjualan::findOrFail($id);

        $hargaJual = HargaJual::findOrFail($request->harga_jual_id);
        $total = $request->jumlah_kilo * $hargaJual->harga;

        $penjualan->update(array_merge($request->all(), ['total' => $total]));

        Alert::success('Success', 'Penjualan updated successfully.');
        return redirect()->route('penjualan.index');
    }

    public function destroy($id)
    {
        $penjualan = Penjualan::findOrFail($id);
        $penjualan->delete();

        Alert::success('Success', 'Penjualan deleted successfully.');
        return redirect()->route('penjualan.index');
    }
}
