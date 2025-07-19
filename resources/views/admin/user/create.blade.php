@extends('layouts.app')

@push('styles')
    @vite(['resources/css/admin-css/create_user.css'])
@endpush

@section('content')


<div class="form-container">
    <div class="form-header">
        <div class="form-title">Tambah User Baru</div>
        <a href="{{ route('admin.user.index') }}" class="btn-kembali"><i class="bi bi-arrow-left"></i> <span>Kembali</span></a>
    </div>

    <form action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-main">
            <!-- Kolom kiri untuk upload foto -->
            <div class="left-upload">
                <div class="upload-preview">
                    <i id="camera-icon" class="bi bi-person-circle"></i>
                    <img id="preview-avatar" src="#" alt="Preview">
                </div>
                <input type="file" name="avatar" class="form-control" onchange="previewImage(event)">
            </div>

            <!-- Kolom kanan untuk form -->
            <div class="right-form">
                <div class="row-cols">
                    <div class="form-group col-half">
                        <label for="name">Nama</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="form-group col-half">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                </div>

                <div class="row-cols">
                    <div class="form-group col-half">
                        <label for="phone">No. Telepon</label>
                        <input type="text" name="phone" class="form-control" required>
                    </div>

                    <div class="form-group col-half">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                </div>

                <div class="row-cols">
                    <div class="form-group col-half">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <div class="form-group col-half">
                        <label for="role">Role</label>
                        <select name="role" class="form-control" required>
                            <option value="">-- Pilih Role --</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ ucfirst($role->name) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-end mt-4">
            <button type="submit" class="btn btn-simpan">
                <i class="bi bi-check-circle"></i> Simpan
            </button>
        </div>
    </form>
</div>

<script>
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('preview-avatar');
        const icon = document.getElementById('camera-icon');

        const file = input.files[0];
        if (file) {
            preview.src = URL.createObjectURL(file);
            preview.style.display = 'block';
            icon.style.display = 'none';
        }
    }
</script>
@endsection
