<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $user->country_name = $user->country ? $user->country->name : null;

        return view('profile.index', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required'],
            'mobile' => ['required'],
        ]);

        $user->update([
            'name' => $request->name,
            'mobile' => $request->mobile,
        ]);

        return $user;
    }

    public function changePassword(Request $request, User $user)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = auth()->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return response(['message' => 'Sorry the password you entered is incorrect.'], 412);
        }

        $user->update([
            'password' => bcrypt($request->password)
        ]);

        return response(['message' => 'Password changed successfully.'], 200);
    }
}
