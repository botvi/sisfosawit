@extends('template-admin.layout')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Penggajian</h4>

        <div class="card mb-4">
            <h5 class="card-header">Cek Gaji {{ $bulan }}</h5>
            <div class="card-body">
                <form action="{{ route('penggajian.cek') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="jabatan" class="form-label">Jabatan</label>
                        <select class="form-select" id="jabatan" name="jabatan" required>
                            <option value="Tukang Muat">Tukang Muat</option>
                            <option value="Supir">Supir</option>
                            <option value="Pencatat">Pencatat</option> <!-- Tambahkan ini -->
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Cek Gaji</button>
                </form>
            </div>
        </div>
    </div>
@endsection
