@extends('backend.dashboard.index')

@section('title', 'Data User')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold">Data User</h4>
        <a href="{{ route('user_create') }}" class="btn btn-primary btn-sm">+ Tambah User</a>
    </div>

    {{-- Form Pencarian --}}
    <form action="{{ route('user') }}" method="GET" class="mb-3 d-flex" role="search">
        <input type="text" name="search" class="form-control me-2" placeholder="Cari user..."
            value="{{ request('search') }}">
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
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>{{ $user->status }}</td>
                            <td>
                                <a href="{{ route('user_edit', $user->user_id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('user_delete', $user->user_id) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data user</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection