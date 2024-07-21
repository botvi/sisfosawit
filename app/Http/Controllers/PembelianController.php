<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\Karyawan;
use App\Models\HargaBeli;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PembelianController extends Controller
{
    public function index()
    {
        $pembelian = Pembelian::all();
        return view('pageadmin.pembelian.index', compact('pembelian'));
    }

    public function create()
    {
        $karyawans = Karyawan::whereIn('jabatan', ['tukang muat', 'supir'])->get();
        $hargaBelis = HargaBeli::all();
        return view('pageadmin.pembelian.create', compact('karyawans', 'hargaBelis'));
    }
    
   
    

    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|array',
            'tanggal' => 'required|date',
            'jumlah_kilo' => 'required|numeric',
            'harga_beli_id' => 'required|exists:harga_belis,id',
        ]);

        $hargaBeli = HargaBeli::find($request->harga_beli_id);
        $total = $hargaBeli->harga * $request->jumlah_kilo;

        Pembelian::create([
            'karyawan_id' => json_encode($request->karyawan_id), // Convert array to JSON
            'tanggal' => $request->tanggal,
            'jumlah_kilo' => $request->jumlah_kilo,
            'harga_beli_id' => $request->harga_beli_id,
            'total' => $total,
        ]);

        Alert::success('Berhasil', 'Data pembelian berhasil ditambahkan');

        return redirect()->route('pembelian.index');
    }

    public function edit($id)
    {
        $pembelian = Pembelian::findOrFail($id);
        $karyawans = Karyawan::whereIn('jabatan', ['tukang muat', 'supir'])->get();
        $hargaBelis = HargaBeli::all();
        $selectedKaryawans = json_decode($pembelian->karyawan_id, true); // Decode JSON string to array
        return view('pageadmin.pembelian.edit', compact('pembelian', 'karyawans', 'hargaBelis', 'selectedKaryawans'));
    }

    public function update(Request $request, Pembelian $pembelian)
    {
        $request->validate([
            'karyawan_id' => 'required|array',
            'tanggal' => 'required|date',
            'jumlah_kilo' => 'required|numeric',
            'harga_beli_id' => 'required|exists:harga_belis,id',
        ]);

        $hargaBeli = HargaBeli::find($request->harga_beli_id);
        $total = $hargaBeli->harga * $request->jumlah_kilo;

        $pembelian->update([
            'karyawan_id' => json_encode($request->karyawan_id), // Convert array to JSON
            'tanggal' => $request->tanggal,
            'jumlah_kilo' => $request->jumlah_kilo,
            'harga_beli_id' => $request->harga_beli_id,
            'total' => $total,
        ]);

        Alert::success('Berhasil', 'Data pembelian berhasil diubah');

        return redirect()->route('pembelian.index');
    }

    public function destroy(Pembelian $pembelian)
    {
        $pembelian->delete();
        Alert::success('Berhasil', 'Data pembelian berhasil dihapus');

        return redirect()->route('pembelian.index');
    }
}
