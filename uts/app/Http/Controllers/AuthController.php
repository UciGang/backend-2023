<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        #menangkap inputan
        $input = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];

        #insert data ke table user
        $user = User::create($input);

        $data = [
            'pesan' => 'User berhasil dibuat'
        ];

        return response()->json($data, 200);
    }

    #buat login
    public function login(Request $request)
    {
        $input = [
            'email' => $request->email,
            'password' => $request->password
        ];

        # ambil data user dari DB
        $user = User::where('email', $input['email'])->first();

        # membandingkan input dengan data yang ada
        $isLoginSuccessfully = (
            $input['email'] == $user->email
            &&
            Hash::check($input['password'], $user->password)
        );

        if ($isLoginSuccessfully) {
            # buat token
            $token = $user->createToken('auth_token');

            $data = [
                'pesan' => 'Login Berhasil',
                'token' => $token->plainTextToken
            ];

            # mengembalikan respon json
            return response()->json($data, 200);
        } else {
            $data = [
                'pesan' => 'email atau password salah'
            ];

            return response()->json($data, 401);
        }
    }
}
