<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Kategori";
        $datas = Categories::orderBy('id', 'desc')->get();
        return view('admin.categories.index', compact('title', 'datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Categories';
        return view('admin.categories.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Categories::create(
            [
                'category_name' => $request->category_name,
            ]
        );
        return redirect()->to(('categories.index'));
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
        $title = 'Edit Kategori';
        $edit = Categories::find($id);
        return view('admin.categories.edit', compact('title', 'edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categories = categories::find($id);
        $rules = [
            'category_name' => ['required'],
        ];
        $validation = Validator::make($request->all(), $rules);
        if ($validation->fails()) {
            return back()->withErrors($validation)->withInput();
        }
        $categories->update($validation->validated());
        return redirect()->to(('categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Categories::find($id)->delete();
        return redirect()->to('categories.index');
    }
}
