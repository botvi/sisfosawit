@extends('template-admin.layout')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Pembelian</h4>

    <div class="mb-3">
        <a href="{{ route('pembelian.create') }}" class="btn btn-primary">Tambah Data</a>
    </div>

    <div class="card">
        <h5 class="card-header">Pembelian</h5>
        <div class="table-responsive text-nowrap p-4">
            <table id="example" class="display compact nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Karyawan</th>
                        <th>Tanggal</th>
                        <th>Jumlah Kg</th>
                        <th>Harga Beli</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($pembelian as $pb)
                        <tr>
                            <td>
                                @php
                                    // Mengambil data karyawan dari JSON
                                    $karyawanIds = json_decode($pb->karyawan_id, true);
                                    $karyawanNames = \App\Models\Karyawan::whereIn('id', $karyawanIds)->pluck('nama')->toArray();
                                @endphp
                                {{ implode(', ', $karyawanNames) }}
                            </td>
                            <td>{{ $pb->tanggal }}</td>
                            <td>{{ $pb->jumlah_kilo }} Kg</td>
                            <td>Rp {{ number_format($pb->hargaBeli->harga, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($pb->total, 0, ',', '.') }}</td>
                            <td>
                                <a href="{{ route('pembelian.edit', $pb->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('pembelian.destroy', $pb->id) }}" method="POST" style="display:inline-block;">
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
