@extends('backend.dashboard.index')

@section('title', 'Edit Jabatan')

@section('content')
<div class="container">
    <h4 class="fw-bold mb-3">Edit Data Jabatan</h4>

    <form action="{{ route('position_update', $p->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Jabatan</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama', $p->nama_jabatan) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="gaji" class="form-label">Gaji Pokok</label>
            <input type="text" name="gaji" id="gaji" value="{{ old('gaji', $p->gaji_pokok) }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('position') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection