@extends('layouts.app')

@push('styles')
    @vite(['resources/css/admin-css/index_user.css'])
@endpush

@section('content')
<style>

</style>

<div class="container-fluid px-0">
    <!-- Gambar Hero -->
    <div class="hero-section"></div>

    <!-- Judul -->
    <div class="container table-container">
        <div class="section-title fs-1  ">Data User</div>

        <!-- Tombol Tambah User -->
        <div class="add-user-btn">
            <a href="{{ route('admin.user.create') }}" class="btn btn-success ">+ Tambah User</a>
        </div>

        <!-- Tabel -->
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA</th>
                        <th>ROLE</th>
                        <th>EMAIL</th>
                        <th>TANGGAL DAFTAR</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $index => $user)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->roles->pluck('name')->implode(', ') }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y') }}</td>
                        <td class="action-icons">
                            <a href="{{ route('admin.user.show', $user->id) }}" class="text-primary"><i class="bi bi-eye"></i></a>
                            <a href="{{ route('admin.user.edit', $user->id) }}" class="text-warning"><i class="bi bi-pencil-square"></i></a>
                            <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link text-danger p-0 m-0" onclick="return confirm('Hapus user ini?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
