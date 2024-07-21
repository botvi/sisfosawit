@extends('template-admin.layout')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Harga Jual</h4>

        <div class="mb-3">
            <a href="{{ route('hargajual.create') }}" class="btn btn-primary">Tambah Data</a>
        </div>

        <div class="card">
            <h5 class="card-header">Harga Jual</h5>
            <div class="table-responsive text-nowrap p-4">
                <table id="example" class="display compact nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Harga</th>
                            <th>Tanggal Berlaku</th>
                            <th>Pabrik</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($hargaJual as $hj)
                            <tr>
                                <td>{{ $hj->harga }}</td>
                                <td>{{ $hj->tanggal_berlaku }}</td>
                                <td>{{ $hj->pabrik }}</td>
                                <td>
                                    <a href="{{ route('hargajual.edit', $hj->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('hargajual.destroy', $hj->id) }}" method="POST" style="display:inline-block;">
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
