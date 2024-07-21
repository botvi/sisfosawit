<?php

namespace App\Http\Controllers;

use App\Models\HargaJual;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class HargaJualController extends Controller
{
    public function index()
    {
        $hargaJual = HargaJual::all();
        return view('pageadmin.hargajual.index', compact('hargaJual'));
    }

    public function create()
    {
        return view('pageadmin.hargajual.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'harga' => 'required|numeric',
            'tanggal_berlaku' => 'required|date',
            'pabrik' => 'required|string|max:255',
        ]);

        HargaJual::create($request->all());
        Alert::success('Berhasil', 'Data harga jual berhasil ditambahkan');

        return redirect()->route('hargajual.index');
    }

    public function edit(HargaJual $hargaJual)
    {
        return view('pageadmin.hargajual.edit', compact('hargaJual'));
    }

    public function update(Request $request, HargaJual $hargaJual)
    {
        $request->validate([
            'harga' => 'required|numeric',
            'tanggal_berlaku' => 'required|date',
            'pabrik' => 'required|string|max:255',
        ]);

        $hargaJual->update($request->all());
        Alert::success('Berhasil', 'Data harga jual berhasil diubah');

        return redirect()->route('hargajual.index');
    }

    public function destroy(HargaJual $hargaJual)
    {
        $hargaJual->delete();
        Alert::success('Berhasil', 'Data harga jual berhasil dihapus');

        return redirect()->route('hargajual.index');
    }
}
