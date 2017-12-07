<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data = 'Halo dunia';

        return view('test', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:5|max:20',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:6|max:32',
            'avatar' => 'required|image',
        ]);

        $avatar = $request->avatar->store('avatars');

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'avatar' => $avatar,
        ]);

        return back()->withSuccess('data berhasil dibuat');
    }
}
