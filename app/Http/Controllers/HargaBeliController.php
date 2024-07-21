<?php

namespace App\Http\Controllers;

use App\Models\HargaBeli;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class HargaBeliController extends Controller
{
    public function index()
    {
        $hargaBeli = HargaBeli::all();
        return view('pageadmin.hargabeli.index', compact('hargaBeli'));
    }

    public function create()
    {
        return view('pageadmin.hargabeli.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'harga' => 'required|numeric',
            'tanggal_berlaku' => 'required|date',
        ]);

        HargaBeli::create($request->all());
        Alert::success('Berhasil', 'Data harga beli berhasil ditambahkan');

        return redirect()->route('hargabeli.index');
    }

    public function edit(HargaBeli $hargaBeli)
    {
        return view('pageadmin.hargabeli.edit', compact('hargaBeli'));
    }

    public function update(Request $request, HargaBeli $hargaBeli)
    {
        $request->validate([
            'harga' => 'required|numeric',
            'tanggal_berlaku' => 'required|date',
        ]);

        $hargaBeli->update($request->all());
        Alert::success('Berhasil', 'Data harga beli berhasil diubah');

        return redirect()->route('hargabeli.index');
    }

    public function destroy(HargaBeli $hargaBeli)
    {
        $hargaBeli->delete();
        Alert::success('Berhasil', 'Data harga beli berhasil dihapus');

        return redirect()->route('hargabeli.index');
    }
}
