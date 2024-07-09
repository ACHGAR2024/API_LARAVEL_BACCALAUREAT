<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest; // Assuming you have a validation request for profile updates
use Symfony\Component\HttpFoundation\RedirectResponse;

class ProfileController extends Controller
{
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'pseudo' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'email' => 'required|string|email|max:255',
        ]);

        $user = Auth::user();
        $user->fill($request->all()); // Use fill to update multiple attributes

        // Check if image was uploaded
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($user->image) {
                Storage::delete('public/' . $user->image);
            }

            // Store new image
            $path = $request->file('image')->store('photos', 'public');
            $user->image = $path;
        }

        // Reset email_verified_at if email changed
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return back()->with('status', 'profile-updated');
    }

    public function destroy(Request $request)
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