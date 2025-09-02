<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MemberControllers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Member::get();
        $title = "Members";
        return view('admin.member.index', compact('datas', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lastid = DB::table('members')->max('id') ?? 0;
        $newid = $lastid + 1;
        $prefix = "MBR";
        $date = now()->format('d-m-Y');
        $counter = str_pad($newid, 5, '0', STR_PAD_LEFT);
        $code = "{$prefix}{$date}{$counter}";
        $title = "Tambah Member";
        return view('admin.member.create', compact('title', 'code'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'nomor_anggota' => ['required'],
            'nik' => ['required', 'numeric'],
            'nama' => ['required'],
            'email' => ['required', 'unique:members'],
            'phone' => ['required', 'unique:members']
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        Member::create([
            'nomor_anggota' => $request->nomor_anggota,
            'nik' => $request->nik,
            'nama' => $request->nama,
            'phone' => $request->phone,
            'email' => $request->email
        ]);
        return redirect()->to(('members'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = "Edit Member";
        $edit = Member::find($id);
        return view('admin.member.edit', compact('edit', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $member = Member::find($id);

        // $member->fill($request->all()); // semua input name harus sama dengan column table
        $member->nomor_anggota =  $request->nomor_anggota;
        $member->nik =  $request->nik;
        $member->nama =  $request->nama;
        $member->phone =  $request->phone;
        $member->email =  $request->email;
        $member->save();
        return redirect()->to('members');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Member::withTrashed()->find($id)->forceDelete();
        return redirect()->to('members');
    }

    public function softdelete(string $id)
    {
        Member::find($id)->delete();
        return redirect()->to('members');
    }

    public function indexrestore()
    {
        $member_r = Member::onlyTrashed()->get();
        $title = "Restore Member";
        return view('admin.member.restore', compact('member_r', 'title'));
    }

    public function restore(string $id)
    {
        $member = Member::withTrashed()->find($id);
        $member->restore();
        return redirect()->to('members');
    }
}
