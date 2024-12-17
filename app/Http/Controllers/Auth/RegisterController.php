<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validasi input dari form registrasi
        $data = $request->validate([
            'email' => 'required|email|unique:users,email',
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Menentukan role berdasarkan domain email
        $emailDomain = substr(strrchr($data['email'], "@"), 1); // Mendapatkan domain email
        $role = $this->determineRoleByEmailDomain($emailDomain);

        // Membuat pengguna baru dengan role yang sesuai
        User::create([
            'email' => $data['email'],
            'name' => $data['name'],
            'password' => Hash::make($data['password']),
            'role' => $role, // Menetapkan role berdasarkan domain email
        ]);

        return redirect()->route('login');
    }

    // Fungsi untuk menentukan role berdasarkan domain email
    private function determineRoleByEmailDomain($domain)
    {
        if ($domain === 'admin.com') {
            return 'admin';
        }
        return 'user'; // Default user jika tidak menggunakan domain admin.com
    }
}
