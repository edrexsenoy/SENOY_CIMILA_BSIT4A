<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    /**
     * Display a listing of users for admin
     */
    public function index()
    {
        $users = User::all();
        return view('admin.index', compact('users'));
    }

    /**
     * Show the form for editing the specified user
     */
    public function edit(User $user)
    {
        return view('admin.edit', compact('user'));
    }

    /**
     * Update the specified user in storage
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('admin.index')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified user from storage
     */
    public function delete(User $user)
    {
        $user->delete();
        return redirect()->route('admin.index')->with('success', 'User deleted successfully');
    }

    /**
     * Display the specified user
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
     * Update the user's password in storage.
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
