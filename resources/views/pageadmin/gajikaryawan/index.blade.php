@extends('template-admin.layout')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Gaji Karyawan</h4>

        <div class="card mb-4">
            <h5 class="card-header">Daftar Gaji Karyawan</h5>
            <div class="card-body">
                <a href="{{ route('gaji_karyawan.create') }}" class="btn btn-primary mb-3">Tambah Gaji Karyawan</a>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="table-responsive text-nowrap p-4">
                    <table id="example" class="display compact nowrap" style="width:100%">                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Karyawan</th>
                            <th>Jumlah Gaji</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($gajiKaryawan as $index => $gaji)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $gaji->karyawan->nama }}</td>
                                <td>Rp {{ number_format($gaji->jumlah_gaji, 0, ',', '.') }}</td>
                                <td>
                                    <a href="{{ route('gaji_karyawan.edit', $gaji) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('gaji_karyawan.destroy', $gaji) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
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
