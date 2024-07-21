@extends('template-admin.layout')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Hasil Penggajian {{ $bulan }}</h4>

        <div class="card mb-4">
            <h5 class="card-header">Gaji Karyawan {{ $jabatan }} {{ \Carbon\Carbon::parse($bulan)->translatedFormat('F Y') }}</h5>
            <div class="card-body">
                <div class="row">
                    @foreach ($gajiKaryawan as $karyawanId => $data)
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $data['nama'] }}</h5>
                                    <p class="card-text">Gaji: Rp {{ number_format($data['gaji'], 0, ',', '.') }}</p>
                                    @isset($data['status'])
                                        @if ($data['status'] === 'Belum Dibayar')
                                            <form action="{{ route('penggajian.updateStatus') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="karyawan_id" value="{{ $karyawanId }}">
                                                <button type="submit" class="btn btn-success">Tandai Sebagai Dibayar</button>
                                            </form>
                                        @else
                                            <p class="text-success">Gaji Sudah Dibayar</p>
                                        @endif
                                    @else
                                        <p class="text-warning">Status tidak tersedia</p>
                                    @endisset
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
