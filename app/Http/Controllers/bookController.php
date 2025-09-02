<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Location;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class bookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Buku";
        $category = Categories::get();
        $datas = Book::orderBy('id', 'desc')->get();
        return view('admin.books.index', compact('title', 'datas', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Buku';
        $category = Categories::orderBy('id', 'desc')->get();
        $location = Location::orderBy('id', 'desc')->get();
        return view('admin.books.create', compact('title', 'category', 'location'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'id_location' => ['required'],
            'id_category' => ['required'],
            'title' => ['required'],
            'writer' => ['required'],
            'publisher' => ['required'],
            'publish_year' => ['required'],
            'description' => ['nullable'],
            'stock' => ['required'],
        ];
        $validation = Validator::make($request->all(), $rules);
        if ($validation->fails()) {
            return back()->withErrors($validation)->withInput();
        }

        Book::create([
            'id_location' => $request->id_location,
            'id_category' => $request->id_category,
            'title' => $request->title,
            'writer' => $request->writer,
            'publisher' => $request->publisher,
            'publish_year' => $request->publish_year,
            'description' => $request->description,
            'stock' => $request->stock
        ]);
        return redirect()->to('books');
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
        $title = 'Edit Buku';
        $edit = Book::find($id);
        $category = Categories::orderBy('id', 'desc')->get();
        $location = Location::orderBy('id', 'desc')->get();
        return view('admin.books.edit', compact('title', 'category', 'location', 'edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Book::find($id)->delete();
        return redirect()->to('books');
    }
}
