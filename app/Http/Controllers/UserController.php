<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function index()
    {
        // Récupérer tous les utilisateurs, les trier pour afficher les administrateurs (role_id = 2) en premier
        // puis trier par date de création pour les autres utilisateurs
        $users = User::orderByRaw('role_id = 2 DESC, created_at DESC')->get();
        $currentUser = Auth::user();
        return view('user.index', compact('users', 'currentUser'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function toggleRole(User $user)
    {
        // Basculer entre les rôles 1 et 2
        if ($user->role_id == 1) {
            $user->role_id = 2;
        } else if ($user->role_id == 2) {
            $user->role_id = 1;
        }

        $user->save();

        return back()->with('message', 'Le statut du compte a bien été modifié.');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->withErrors(['erreur' => 'Suppression du compte réussie.']);

    }




}