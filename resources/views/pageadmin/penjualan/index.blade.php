@extends('template-admin.layout')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Penjualan</h4>

        <div class="mb-3">
            <a href="{{ route('penjualan.create') }}" class="btn btn-primary">Tambah Data</a>
        </div>

        <div class="card">
            <h5 class="card-header">Penjualan</h5>
            <div class="table-responsive text-nowrap p-4">
                <table id="example" class="display compact nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Karyawan</th>
                            <th>Tanggal</th>
                            <th>Jumlah Kg</th>
                            <th>Harga Jual</th>
                            <th>Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($penjualans as $penjualan)
                            <tr>
                                <td>{{ $penjualan->karyawan->nama }} ({{ $penjualan->karyawan->jabatan }})</td>
                                <td>{{ $penjualan->tanggal }}</td>
                                <td>{{ $penjualan->jumlah_kilo }} Kg</td>
                                <td>Rp {{ number_format($penjualan->hargaJual->harga, 0, ',', '.') }}</td>
                                <td>Rp {{ number_format($penjualan->total, 0, ',', '.') }}</td>
                                <td>
                                    <a href="{{ route('penjualan.edit', $penjualan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('penjualan.destroy', $penjualan->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus ini?')">Hapus</button>
                                    </form>
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
