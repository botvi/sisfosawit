@extends('template-admin.layout')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Edit Harga Beli</h4>

        <div class="card mb-4">
            <h5 class="card-header">Edit Harga Beli</h5>
            <div class="card-body">
                <form action="{{ route('hargabeli.update', $hargaBeli->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Harga</label>
                        <input type="number" name="harga" class="form-control" value="{{ $hargaBeli->harga }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal Berlaku</label>
                        <input type="date" name="tanggal_berlaku" class="form-control" value="{{ $hargaBeli->tanggal_berlaku }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
