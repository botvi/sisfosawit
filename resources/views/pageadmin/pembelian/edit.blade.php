@extends('template-admin.layout')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Edit Pembelian</h4>

        <div class="card mb-4">
            <h5 class="card-header">Edit Pembelian</h5>
            <div class="card-body">
                <form action="{{ route('pembelian.update', $pembelian->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Karyawan</label>
                        @foreach ($karyawans as $karyawan)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="karyawan_id[]" value="{{ $karyawan->id }}" id="karyawan{{ $karyawan->id }}"
                                    @if (in_array($karyawan->id, $selectedKaryawans)) checked @endif>
                                <label class="form-check-label" for="karyawan{{ $karyawan->id }}">
                                    {{ $karyawan->nama }} ({{ $karyawan->jabatan }})
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" value="{{ $pembelian->tanggal }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jumlah Kilo</label>
                        <input type="number" name="jumlah_kilo" class="form-control" value="{{ $pembelian->jumlah_kilo }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Harga Beli</label>
                        <select name="harga_beli_id" class="form-control" required>
                            @foreach ($hargaBelis as $hargaBeli)
                                <option value="{{ $hargaBeli->id }}" @if ($hargaBeli->id == $pembelian->harga_beli_id) selected @endif>
                                    {{ $hargaBeli->harga }} ({{ $hargaBeli->tanggal_berlaku }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
