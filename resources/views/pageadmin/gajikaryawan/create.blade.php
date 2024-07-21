@extends('template-admin.layout')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Tambah Gaji Karyawan</h4>

        <div class="card mb-4">
            <h5 class="card-header">Tambah Gaji Karyawan</h5>
            <div class="card-body">
                <form action="{{ route('gaji_karyawan.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="karyawan_id" class="form-label">Karyawan</label>
                        <select class="form-select" id="karyawan_id" name="karyawan_id" required>
                            <option value="" disabled selected>Pilih Karyawan</option>
                            @foreach($karyawans as $karyawan)
                                <option value="{{ $karyawan->id }}">{{ $karyawan->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="jumlah_gaji" class="form-label">Jumlah Gaji</label>
                        <input type="number" step="0.01" class="form-control" id="jumlah_gaji" name="jumlah_gaji" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
