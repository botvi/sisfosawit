<?php

namespace App\Http\Controllers;

use App\Models\GajiKaryawan;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class GajiKaryawanController extends Controller
{
    public function index()
    {
        $gajiKaryawan = GajiKaryawan::with('karyawan')->get();
        return view('pageadmin.gajikaryawan.index', compact('gajiKaryawan'));
    }

    public function create()
    {
        $karyawans = Karyawan::all();
        return view('pageadmin.gajikaryawan..create', compact('karyawans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id',
            'jumlah_gaji' => 'required|numeric',
        ]);

        GajiKaryawan::create($request->all());

        Alert::success('Berhasil', 'Gaji karyawan berhasil ditambahkan.');

        return redirect()->route('gaji_karyawan.index');
    }

    public function edit(GajiKaryawan $gajiKaryawan)
    {
        $karyawans = Karyawan::all();
        return view('pageadmin.gajikaryawan..edit', compact('gajiKaryawan', 'karyawans'));
    }

    public function update(Request $request, GajiKaryawan $gajiKaryawan)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id',
            'jumlah_gaji' => 'required|numeric',
        ]);

        $gajiKaryawan->update($request->all());

        Alert::success('Berhasil', 'Gaji karyawan berhasil diperbarui.');

        return redirect()->route('gaji_karyawan.index');
    }

    public function destroy(GajiKaryawan $gajiKaryawan)
    {
        $gajiKaryawan->delete();

        Alert::success('Berhasil', 'Gaji karyawan berhasil dihapus.');

        return redirect()->route('gaji_karyawan.index');
    }
}
