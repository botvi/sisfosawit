@extends('template-admin.layout')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Tambah Karyawan</h4>

        <div class="card mb-4">
            <h5 class="card-header">Tambah Karyawan</h5>
            <div class="card-body">
                <form action="{{ route('karyawans.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Kode Identitas</label>
                        <div class="input-group">
                            <input type="text" name="kd_identitas" id="kd_identitas" class="form-control" required>
                            <button type="button" class="btn btn-sm btn-warning" id="generate-code">Acak</button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Umur</label>
                        <input type="number" name="umur" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jabatan</label>
                        <select name="jabatan" class="form-control" required>
                            <option value="supir">Supir</option>
                            <option value="pencatat">Pencatat</option>
                            <option value="tukang muat">Tukang Muat</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <input type="text" name="alamat" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Telepon</label>
                        <input type="text" name="telepon" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
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
