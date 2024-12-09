<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Pastikan bisa diakses oleh siapa saja
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => [
                'required',
                'string',
                'min:8', // Minimal 8 karakter
                'confirmed', // Konfirmasi password
                'regex:/[A-Z]/', // Harus ada huruf kapital
                'regex:/[a-z]/', // Harus ada huruf non-kapital
                'regex:/[0-9]/', // Harus ada angka
                'regex:/[@$!%*?&]/', // Harus ada simbol
            ],
        ];
    }

    public function messages()
    {
        return [
            'password.regex' => 'Password harus mengandung huruf kapital, huruf kecil, angka, dan simbol.',
        ];
    }
}
