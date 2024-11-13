<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;

class AuthController extends Controller
{
    public function register(Request $request): PostResource{
        $encrypted = bcrypt($request->password);
        $data = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $encrypted
        ]);
        return new PostResource(true, 'Data berhasil ditambahkan', $data);
    }

    public function login(Request $request): PostResource{
        $data = User::where('email', $request->email)->first();
        if($data){
            if(password_verify($request->password, $data->password)){
                return new PostResource(true, 'Login berhasil', $data);
            }else{
                return new PostResource(false, 'Password salah', null);
            }
        }else{
            return new PostResource(false, 'Email tidak terdaftar', null);
        }
    }
}
