<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request; // Tambahkan ini
use Illuminate\Support\Facades\Auth; // Tambahkan ini
use Illuminate\Support\Facades\Validator; // Tambahkan ini
use App\Models\User; // Tambahkan ini
use App\Models\Role; // Tambahkan ini
use Illuminate\Support\Facades\Hash; // Tambahkan ini

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Menampilkan form login.
     * Sesuai Modul B-3
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Menangani proses login.
     * Sesuai Modul C-6 (versi final dengan role redirect)
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::with(['roleUser' => function($query) {
            $query->where('status', 1);
        }, 'roleUser.role'])
            ->where('email', $request->input('email'))
            ->first();

        if (!$user) {
            return redirect()->back()
                ->withErrors(['email' => 'Email tidak ditemukan.'])
                ->withInput();
        }

        // Cek password
        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()
                ->withErrors(['password' => 'Password salah.'])
                ->withInput();
        }

        $namaRole = Role::where('idrole', $user->roleUser[0]->idrole ?? null)->first();

        // Login user ke session
        Auth::login($user);

        // Simpan session user
        // Menggunakan iduser dari model User Anda
        $request->session()->put([
            'user_id' => $user->iduser,
            'user_name' => $user->nama,
            'user_email' => $user->email,
            'user_role' => $user->roleUser[0]->idrole ?? 'user',
            'user_role_name' => $namaRole->nama_role ?? 'User',
            'user_status' => $user->roleUser[0]->status ?? 'active'
        ]);

        // return redirect()->intended('/admin/dashboard')->with('success', 'Login berhasil!');
        // Redirect berdasarkan role
        $userRole = $user->roleUser[0]->idrole ?? null;
        switch ($userRole) {
            case 1: // Asumsi 1 = Administrator
                return redirect()->route('admin.dashboard')->with('success', 'Login berhasil!');
            case 2: // Asumsi 2 = Dokter
                return redirect()->route('dokter.dashboard')->with('success', 'Login berhasil!');
            case 3: // Asumsi 3 = Perawat
                return redirect()->route('perawat.dashboard')->with('success', 'Login berhasil ');
            case 4: // Asumsi 4 = Resepsionis
                return redirect()->route('resepsionis.dashboard')->with('success', 'Login berhasil!');
            default: // Asumsi selain itu = Pemilik
                return redirect()->route('pemilik.dashboard')->with('success', 'Login berhasil');
        }
    }

    /**
     * Menangani proses logout.
     * Sesuai Modul B-3
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success', 'Logout berhasil!');
    }
}