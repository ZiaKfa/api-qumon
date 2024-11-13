<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Resources\PostResource;

class UserController extends Controller
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
        $encrypted = bcrypt($request->password);
        $data = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $encrypted
        ]);
        return new PostResource(true, 'Data berhasil ditambahkan', $data);
    }

    public function show($id): PostResource{
        $data = User::find($id);
        return new PostResource(true, 'Data berhasil diambil', $data);
    }

    public function update(Request $request, $id): PostResource{
        $data = User::find($id);
        $data->update([
            'name' => $request->name,
            'email' => $request->email
        ]);
        return new PostResource(true, 'Data berhasil diupdate', $data);
    }

    public function destroy($id): PostResource{
        $data = User::find($id);
        $data->delete();
        return new PostResource(true, 'Data berhasil dihapus', $data);
    }
}
