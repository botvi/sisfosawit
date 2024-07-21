@extends('template-admin.layout')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Tambah Penjualan</h4>

        <div class="card mb-4">
            <h5 class="card-header">Tambah Penjualan</h5>
            <div class="card-body">
                <form action="{{ route('penjualan.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Karyawan</label>
                        <select name="karyawan_id" class="form-control" required>
                            <option value="">Pilih Karyawan</option>
                            @foreach ($karyawans as $karyawan)
                                <option value="{{ $karyawan->id }}">{{ $karyawan->nama }} ({{ $karyawan->jabatan }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jumlah Kg</label>
                        <input type="number" name="jumlah_kilo" class="form-control" id="jumlah_kilo" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Harga Jual</label>
                        <select name="harga_jual_id" class="form-control" id="harga_jual_id" required>
                            @foreach ($hargaJuals as $hargaJual)
                                <option value="{{ $hargaJual->id }}" data-harga="{{ $hargaJual->harga }}">
                                    {{ $hargaJual->harga }} ({{ $hargaJual->pabrik }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Total</label>
                        <input type="number" name="total" class="form-control" id="total" required readonly>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const jumlahKiloInput = document.getElementById('jumlah_kilo');
            const hargaJualSelect = document.getElementById('harga_jual_id');
            const totalInput = document.getElementById('total');

            function calculateTotal() {
                const harga = parseFloat(hargaJualSelect.options[hargaJualSelect.selectedIndex].dataset.harga) || 0;
                const jumlahKilo = parseFloat(jumlahKiloInput.value) || 0;
                totalInput.value = harga * jumlahKilo;
            }

            jumlahKiloInput.addEventListener('input', calculateTotal);
            hargaJualSelect.addEventListener('change', calculateTotal);
        });
    </script>
@endsection
