@extends('backend.dashboard.index')

@section('title', 'Data Jabatan')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="fw-bold">Data Jabatan</h4>
    <a href="{{ route('position_create') }}" class="btn btn-primary btn-sm">+ Tambah Jabatan</a>
</div>

{{-- Form Pencarian --}}
<form action="{{ route('position') }}" method="GET" class="mb-3 d-flex" role="search">
    <input type="text" name="search" class="form-control me-2" placeholder="Cari jabatan..." value="{{ request('search') }}">
    <button type="submit" class="btn btn-outline-primary">Cari</button>
</form>

{{-- Pesan Sukses --}}
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body">
        <table class="table table-striped table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Nama Jabatan</th>
                    <th>Gaji</th>
                    <th width="180">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($p as $position)
                <tr>
                    <td>{{ $position->nama_jabatan }}</td>
                    <td>{{ $position->gaji_pokok }}</td>
                    <td>

                        <a href="{{ route('position_edit', $position->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('position_delete', $position->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Tidak ada data jabatan</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection