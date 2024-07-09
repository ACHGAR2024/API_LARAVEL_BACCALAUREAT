<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'pseudo' => ['required', 'string', 'max:255'],
            'image' => ['required', 'image', 'mimes:jpeg,png', 'max:1024'], // Validation de l'image
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Gestion du téléchargement de l'image
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('avatars', 'public');
        } else {
            $imagePath = 'avatars/default.png';
        }

        $user = User::create([
            'pseudo' => $request->pseudo,
            'image' => $imagePath,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('home'));
    }
}
