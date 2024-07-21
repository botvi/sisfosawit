@extends('template-admin.layout')
@section('style')
<style>
    @media print {
        /* Sembunyikan elemen selain tabel */
        .no-print {
            display: none;
        }
    }
</style>

@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4 no-print"><span class="text-muted fw-light">Dashboard /</span> Laporan</h4>

        <div class="card mb-4 no-print">
            <h5 class="card-header">Filter Laporan</h5>
            <div class="card-body">
                <form id="filterForm" action="{{ route('laporan.index') }}" method="GET">
                    <div class="mb-3">
                        <label for="model" class="form-label">Model</label>
                        <select class="form-select" id="model" name="model" required>
                            <option value="" disabled selected>Pilih Table</option>
                            <option value="pembelian" {{ $model === 'pembelian' ? 'selected' : '' }}>Pembelian</option>
                            <option value="penjualan" {{ $model === 'penjualan' ? 'selected' : '' }}>Penjualan</option>
                            <option value="penggajian" {{ $model === 'penggajian' ? 'selected' : '' }}>Penggajian</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="bulan" class="form-label">Bulan</label>
                        <input type="month" class="form-control" id="bulan" name="bulan" value="{{ $bulan }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Filter</button>
                </form>
            </div>
        </div>

        <!-- Tabel Pembelian -->
        @if($model === 'pembelian')
            <div class="card mb-4">
                <h5 class="card-header">Laporan Pembelian</h5>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>JUMLAH KILOGRAM</th> <!-- Ganti dengan kolom yang sesuai -->
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pembelian as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->jumlah_kilo }} Kg</td> <!-- Ganti dengan kolom yang sesuai -->
                                    <td>Rp {{ number_format($item->total, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2" class="text-end">Total</td>
                                <td>Rp {{ number_format($totalPembelian, 0, ',', '.') }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        @endif

        <!-- Tabel Penjualan -->
        @if($model === 'penjualan')
            <div class="card mb-4">
                <h5 class="card-header">Laporan Penjualan</h5>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>JUMLAH KILOGRAM</th><!-- Ganti dengan kolom yang sesuai -->
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($penjualan as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->jumlah_kilo }} Kg</td> <!-- Ganti dengan kolom yang sesuai -->
                                    <td>Rp {{ number_format($item->total, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2" class="text-end">Total</td>
                                <td>Rp {{ number_format($totalPenjualan, 0, ',', '.') }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        @endif

        <!-- Tabel Penggajian -->
        @if($model === 'penggajian')
            <div class="card mb-4">
                <h5 class="card-header">Laporan Penggajian</h5>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Karyawan</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($penggajian as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->karyawan->nama }}</td>
                                    <td>Rp {{ number_format($item->jumlah, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2" class="text-end">Total</td>
                                <td>Rp {{ number_format($totalPenggajian, 0, ',', '.') }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        @endif

        <div class="text-end no-print">
            <button class="btn btn-primary" onclick="printTable()">Print</button>
        </div>
    </div>

    <script>
        function printTable() {
            // Sembunyikan elemen selain tabel
            document.querySelectorAll('.no-print').forEach(function (element) {
                element.style.display = 'none';
            });

            // Print tabel
            window.print();

            // Tampilkan kembali elemen yang tersembunyi
            document.querySelectorAll('.no-print').forEach(function (element) {
                element.style.display = '';
            });
        }
    </script>
@endsection
