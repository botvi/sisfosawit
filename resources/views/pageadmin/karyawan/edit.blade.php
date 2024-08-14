@extends('template-admin.layout')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Edit Karyawan</h4>

        <div class="card mb-4">
            <h5 class="card-header">Edit Karyawan</h5>
            <div class="card-body">
                <form action="{{ route('karyawans.update', $karyawan->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Kode Identitas</label>
                        <div class="input-group">
                            <input type="text" name="kd_identitas" id="kd_identitas" class="form-control" value="{{ $karyawan->kd_identitas }}" required>
                            <button type="button" class="btn btn-sm btn-warning" id="generate-code">Acak</button>
                        </div>
                    </div>
                      <div class="mb-3">
                        <label class="form-label">NIK</label>
                        <input type="number" name="nik" class="form-control" value="{{ $karyawan->nik }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control" value="{{ $karyawan->nama }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Umur</label>
                        <input type="number" name="umur" class="form-control" value="{{ $karyawan->umur }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jabatan</label>
                        <select name="jabatan" class="form-control" required>
                            <option value="supir" {{ $karyawan->jabatan == 'supir' ? 'selected' : '' }}>Supir</option>
                            <option value="pencatat" {{ $karyawan->jabatan == 'pencatat' ? 'selected' : '' }}>Pencatat</option>
                            <option value="tukang muat" {{ $karyawan->jabatan == 'tukang muat' ? 'selected' : '' }}>Tukang Muat</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <input type="text" name="alamat" class="form-control" value="{{ $karyawan->alamat }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Telepon</label>
                        <input type="text" name="telepon" class="form-control" value="{{ $karyawan->telepon }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('generate-code').addEventListener('click', function() {
            const randomCode = Math.random().toString(36).substring(2, 10).toUpperCase();
            document.getElementById('kd_identitas').value = randomCode;
        });
    </script>
@endsection
