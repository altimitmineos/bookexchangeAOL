<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;


class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request)
{
    $user = $request->user();
    $transactions = $user->transactions()->latest()->get(); // Ambil transaksi terbaru berdasarkan user

    return view('profile.edit', compact('user', 'transactions'));
}


    /**
     * Update the user's profile information.
     */
    
     public function update(ProfileUpdateRequest $request): RedirectResponse
{
    // Mengisi data pengguna dengan data yang valid dari form
    $user = $request->user();
    $user->fill($request->validated());

    // Cek jika ada file foto yang diunggah
    if ($request->hasFile('photo')) {
        // Hapus foto lama jika ada
        if ($user->photo) {
            Storage::delete('public/' . $user->photo);
        }

        // Simpan foto baru
        $photoPath = $request->file('photo')->store('profile_photos', 'public');
        $user->photo = $photoPath;
    }

    // Simpan data pengguna
    $user->save();

    return Redirect::route('profile.edit')->with('status', 'profile-updated');
}

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
