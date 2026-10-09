<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\VillageProfile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = $request->user();

        $village = VillageProfile::first();

        if ($user->role === 'user') {
            return view('user.profile.edit', compact('user', 'village'));
        }

        return view('admin.profile.edit', compact('user', 'village'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        if ($request->user()->role !== 'user') {
            unset(
                $validated['nik'],
                $validated['no_kk'],
                $validated['tempat_lahir'],
                $validated['tanggal_lahir'],
                $validated['jenis_kelamin'],
                $validated['agama'],
                $validated['pekerjaan'],
                $validated['alamat'],
                $validated['rt'],
                $validated['rw'],
                $validated['nomor_wa']
            );
        }

        $request->user()->fill($validated);

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        if ($request->user()->role !== 'user') {
            abort(403);
        }

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
