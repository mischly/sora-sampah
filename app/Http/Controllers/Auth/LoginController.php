<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    /**
     * Logic setelah berhasil login.
     */
    protected function authenticated(Request $request, $user)
    {
        Session::flash('success', 'Login berhasil! Selamat datang ' . $user->name . '.');

        if ($user->hasRole('petugas')) {
            return redirect()->route('petugas.dashboard');
        }

        if ($user->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->intended('/');
    }

    /**
     * Proses login manual agar bisa validasi spesifik.
     */
    protected function attemptLogin(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (! $user) {
            // Email tidak ditemukan
            throw ValidationException::withMessages([
                'email' => ['Email tidak ditemukan.'],
            ]);
        }

        if (! Hash::check($request->password, $user->password)) {
            // Password salah
            throw ValidationException::withMessages([
                'password' => ['Password salah.'],
            ]);
        }

        // Login manual
        Auth::login($user, $request->filled('remember'));

        return true;
    }

    /**
     * Override method login() untuk gunakan login manual di atas.
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        // Cek apakah terlalu banyak percobaan login
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {

            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        // Login menggunakan logic spesifik kita
        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // Seharusnya tidak sampai sini karena semua kegagalan ditangani di attemptLogin
        return $this->sendFailedLoginResponse($request);
    }
}
