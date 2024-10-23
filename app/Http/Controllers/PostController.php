<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Resources\PostResource;

class PostController extends Controller
{
    /**
     * index
     * @return void
     */
    public function index(): PostResource{
        $data = User::all();
        return new PostResource(true, 'Data berhasil diambil', $data);
    }
    /**
     * store
     * @param  mixed $request
     * @return void
     */

    public function store(Request $request): PostResource{
        $data = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);
        return new PostResource(true, 'Data berhasil ditambahkan', $data);
    }
}
