<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfileController extends UserController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $user = User::with('authentications')->findOrFail(auth()->user()->id);
        return view('user.profile.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.profile.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            // 'phone' => 'nullable|string|max:255|unique:users,phone,' . $user->id,
            'new_password' => 'nullable|string',
        ]);
        $user = User::findOrfail($id);
        $user->fill($request->only([
            'name',
            'email',
            // 'phone',
            // 'authority',
        ]));

        // $user->syncRoles($request->input('roles'));

        if (!is_null($request->new_password)) {
            $user->password = Hash::make($request->new_password);
        }

        $user->syncRoles($request->role);

        $user->update();

        return back()->with('success', __('User updated successfully.'));;
    }
}
