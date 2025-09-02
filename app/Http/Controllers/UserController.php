<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // ✅ ADDED: Import the Auth facade.
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * This typically shows all users in the admin panel.
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.index', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'roles' => 'required|string|in:admin,user',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->roles = $request->roles;
        $user->save();

        return redirect()->route('admin.index')->with('success', "User '{$user->name}' updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(User $user)
    {
        // ✅ FIXED: Changed auth()->id() to Auth::id() for better code analysis.
        if (Auth::id() == $user->id) {
            return redirect()->route('admin.index')->with('error', 'You cannot delete your own account.');
        }

        $user->delete();
        return redirect()->route('admin.index')->with('success', 'User deleted successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function view(User $user)
    {
        return view('admin.view', compact('user'));
    }

    /**
     * Show the form for changing the user's password.
     */
    public function showChangePasswordForm(User $user)
    {
        return view('admin.change-password', compact('user'));
    }

    /**
     * Update the user's password.
     */
    public function updatePassword(Request $request, User $user)
    {
        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('admin.index')->with('success', 'Password for ' . $user->name . ' has been updated successfully.');
    }
}
