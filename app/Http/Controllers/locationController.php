<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use Illuminate\Support\Facades\Validator;

class locationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Location';
        $datas = Location::get();
        return view('admin.location.index', compact('title', 'datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Location';
        return view('admin.location.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Location::create(
            [
                'location_code' => $request->location_code,
                'label' => $request->label,
                'shelf' => $request->shelf
            ]
        );
        return redirect()->to(('location/index'));
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
        $title = 'Edit Lokasi';
        $edit = Location::find($id);
        return view('admin.location.edit', compact('title', 'edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $location = Location::find($id);
        $rules = [
            'location_code' => ['required'],
            'label' => ['required'],
            'shelf' => ['required', 'unique:locations']
        ];
        $validation = Validator::make($request->all(), $rules);
        if ($validation->fails()) {
            return back()->withErrors($validation)->withInput();
        }
        $location->update($validation->validated());
        return redirect()->to(('location/index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Location::find($id)->delete();
        return redirect()->to('location/index');
    }
}
