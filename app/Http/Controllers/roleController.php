<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class roleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Role";
        $datas = Roles::orderBy('id', 'desc')->get();
        return view('admin.role.index', compact('title', 'datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Roles';
        return view('admin.role.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Roles::create(
            [
                'name' => $request->name,
            ]
        );
        Alert::success('Success!', 'Data berhasil ditambahkan');
        return redirect()->to('roles');
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
        $title = 'Edit Role';
        $edit = Roles::find($id);
        return view('admin.role.edit', compact('title', 'edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Roles = Roles::find($id);
        $rules = [
            'name' => ['required'],
        ];
        $validation = Validator::make($request->all(), $rules);
        if ($validation->fails()) {
            return back()->withErrors($validation)->withInput();
        }
        $Roles->update($validation->validated());
        Alert::success('Success!', 'Data berhasil diubah');
        return redirect()->to('roles');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Roles::find($id)->delete();
        Alert::success('Success!', 'Data berhasil dihapus');
        return redirect()->to('roles');
    }
}
