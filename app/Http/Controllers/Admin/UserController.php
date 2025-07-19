<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->latest()->paginate(10);
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'phone' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required|exists:roles,id',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $avatarPath = null;
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
        }

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'avatar' => $avatarPath,
        ]);

        $user->roles()->attach($request->role);

        return redirect()->route('admin.user.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function show($id)
    {
        $user = User::with('roles')->findOrFail($id);
        return view('admin.user.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('admin.user.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
    
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username,' . $user->id,
            'phone' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6',
            'role' => 'required|exists:roles,id',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $data = [
            'name' => $request->name,
            'username' => $request->username,
            'phone' => $request->phone,
            'email' => $request->email,
        ];
    
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }
    
        // Proses avatar baru
        if ($request->hasFile('avatar')) {
            // Hapus avatar lama
            if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                Storage::disk('public')->delete($user->avatar);
            }
    
            // Simpan avatar baru
            $avatarName = time() . '.' . $request->avatar->extension();
            $request->avatar->storeAs('public/avatars', $avatarName);
            $data['avatar'] = 'avatars/' . $avatarName; // Simpan path relatif ke storage/app/public
        }
    
        // Update user
        $user->update($data);
    
        // Update role
        $user->roles()->sync([$request->role]);
    
        return redirect()->route('admin.user.index')->with('success', 'User berhasil diperbarui.');
    }
    
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->id === auth()->id()) {
            return back()->with('error', 'Tidak bisa menghapus diri sendiri.');
        }

        // Hapus avatar jika ada
        if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
            Storage::disk('public')->delete($user->avatar);
        }

        $user->roles()->detach();
        $user->delete();

        return redirect()->route('admin.user.index')->with('success', 'User berhasil dihapus.');
    }
}
