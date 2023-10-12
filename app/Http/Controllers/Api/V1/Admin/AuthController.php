<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function register()
    {
        return view('auth.register');
    }

    public function registerPost(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|unique:users,email', // Validasi email unik
            'password' => 'required|string|min:8',
            'role' => 'required|in:admin,user', // Validasi role yang diperbolehkan
        ]);

        // Periksa apakah alamat email sudah digunakan sebelumnya
        $existingUser = User::where('email', strtolower($request->email))->first();
        if ($existingUser) {
            return response()->json([
                'message' => 'Email already in use',
            ], 409); // 409 adalah kode status untuk konflik (conflict)
        }

        $user = User::create([
            'name' => $request->name,
            'email' => strtolower($request->email),
            'password' => Hash::make($request->password),
            'role' => $request->role, // Simpan role yang diterima dari input
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'User successfully registered',
            'access_token' => $token,
            'token_type' => 'Bearer',
        ], 201);
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            $user = auth()->user();
            return redirect()->route('dashboard.page');
        } else {
            return redirect()->back()->withErrors(['password' => 'Password is incorrect']);
        }
    }

    public function logout(Request $request)
    {
        auth()->logout();
        return redirect()->route('login.page');
    }
}
