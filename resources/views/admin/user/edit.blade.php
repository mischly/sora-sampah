@extends('layouts.app')

@push('styles')
    @vite(['resources/css/admin-css/edit_user.css'])
@endpush


@section('content')

<div class="form-container">
    <div class="form-header">
        <div class="form-title">Edit User</div>
        <a href="{{ route('admin.user.index') }}" class="btn-kembali"><i class="bi bi-arrow-left"></i> <span>Kembali</span></a>
    </div>

    <form action="{{ route('admin.user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-main">
            <!-- Kolom kiri untuk upload foto -->
            <div class="left-upload">
                <div class="upload-preview">
                    @if($user->avatar)
                        <img id="preview-avatar" src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar">
                    @else
                        <i id="camera-icon" class="bi bi-person-circle"></i>
                        <img id="preview-avatar" src="#" alt="Preview" style="display: none;">
                    @endif
                </div>
                <input type="file" name="avatar" class="form-control" onchange="previewImage(event)">
            </div>

            <!-- Kolom kanan untuk form -->
            <div class="right-form">
                <div class="row-cols">
                    <div class="form-group col-half">
                        <label for="name">Nama</label>
                        <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                    </div>

                    <div class="form-group col-half">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" value="{{ $user->username }}" required>
                    </div>
                </div>

                <div class="row-cols">
                    <div class="form-group col-half">
                        <label for="phone">No. Telepon</label>
                        <input type="text" name="phone" class="form-control" value="{{ $user->phone }}" required>
                    </div>

                    <div class="form-group col-half">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                    </div>
                </div>

                <div class="row-cols">
                    <div class="form-group col-half">
                        <label for="password">Password (kosongkan jika tidak diubah)</label>
                        <input type="password" name="password" class="form-control">
                    </div>

                    <div class="form-group col-half">
                        <label for="role">Role</label>
                        <select name="role" class="form-control" required>
                            <option value="">-- Pilih Role --</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}" {{ $user->roles->contains('id', $role->id) ? 'selected' : '' }}>
                                    {{ ucfirst($role->name) }}
                                </option>
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
            if (icon) icon.style.display = 'none';
        }
    }
</script>
@endsection
