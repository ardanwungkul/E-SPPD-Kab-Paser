<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // dd($request);
        $request->user()->fill($request->validated());

        if ($request->hasFile('foto')) {

            // Hapus foto lama jika ada
            if ($request->user()->photo) {
                $oldPath = 'public/user/' . $request->user()->photo;

                if (Storage::exists($oldPath)) {
                    Storage::delete($oldPath);
                }
            }

            $imageFile = $request->file('foto');
            $imageName = time() . '_' . mt_rand(100, 999) . '.'
                . $imageFile->getClientOriginalExtension();

            // Simpan file ke storage/app/public/user
            $imageFile->storeAs('public/user', $imageName);

            // Simpan path RELATIF (tanpa "public/")
            $request->user()->photo = 'user/' . $imageName;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with(['success' => 'Berhasil Mengubah Profil']);
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
