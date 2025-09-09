<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Users";
        $datas = user::with('roles')->orderBy('id', 'desc')->get();

        // return $datas;
        return view('admin.user.index', compact('title', 'datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'users';
        return view('admin.user.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        user::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]
        );
        Alert::success('Success!', 'Data berhasil ditambahkan');
        return redirect()->to('users');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = 'Edit user';
        $edit = user::find($id);
        return view('admin.user.edit', compact('title', 'edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $users = user::find($id);
        $users = $request->name;
        $users = $request->email;

        if ($request->filled('password')) {
            $users->password = $request->password;
        }
        $users->save();
        Alert::success('Success!', 'Data berhasil diubah');
        return redirect()->to('users');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        user::find($id)->delete();
        Alert::success('Success!', 'Data berhasil dihapus');
        return redirect()->to('users');
    }

    public function editRole(string $id)
    {
        $title = 'Tambah user role';
        $roles = Roles::get();
        $user = user::with('roles')->find($id);
        // return $user;
        return view('admin.user.add_role', compact('roles', 'user', 'title'));
    }

    public function updateRole(Request $request, string $id)
    {
        $user = user::find($id);
        $user->roles()->sync($request->roles ?? []);
        Alert::success('Success!', 'Role berhasil ditambahkan');
        return redirect()->to('users');
    }
}
