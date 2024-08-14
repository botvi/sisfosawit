<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawans = Karyawan::all();
        return view('pageadmin.karyawan.index', compact('karyawans'));
    }

    public function create()
    {
        return view('pageadmin.karyawan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kd_identitas' => 'required|string|max:112',
            'nik' => 'required|string|max:112|unique:kariawans,nik',
            'nama' => 'required|string|max:255',
            'umur' => 'required|numeric|max:255',
            'jabatan' => 'required|string',
            'alamat' => 'required|string',
            'telepon' => 'required|string|max:15',
        ]);

        Karyawan::create($request->all());
        Alert::success('Berhasil', 'Data karyawan berhasil ditambahkan');

        return redirect()->route('karyawans.index');
    }

    public function edit(Karyawan $karyawan)
    {
        return view('pageadmin.karyawan.edit', compact('karyawan'));
    }

    public function update(Request $request, Karyawan $karyawan)
    {
        $request->validate([
            'kd_identitas' => 'required|string|max:112',
            'nik' => 'required|string|max:112|unique:kariawans,nik',
            'nama' => 'required|string|max:255',
            'umur' => 'required|numeric|max:255',
            'jabatan' => 'required|string',
            'alamat' => 'required|string',
            'telepon' => 'required|string|max:15',
        ]);

        $karyawan->update($request->all());
        Alert::success('Berhasil', 'Data karyawan berhasil diubah');

        return redirect()->route('karyawans.index');
    }

    public function destroy(Karyawan $karyawan)
    {
        $karyawan->delete();
        Alert::success('Berhasil', 'Data karyawan berhasil dihapus');

        return redirect()->route('karyawans.index');
    }
}
