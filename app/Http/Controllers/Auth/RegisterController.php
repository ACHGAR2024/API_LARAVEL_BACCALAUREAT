<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'pseudo' => ['required', 'string', 'max:40'],
            'image' => ['required', 'image', 'mimes:jpeg,png', 'max:1024'], // Ajout des règles pour valider l'image
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'pseudo' => $data['pseudo'],
            'image' => $data['image'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
