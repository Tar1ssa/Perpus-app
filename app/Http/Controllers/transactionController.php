<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use App\Models\Borrows;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\DetailBorrows;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class transactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $datas = Borrows::orderBy('id', 'desc')->get();
        $title = 'Transaksi';
        return view('admin.transactions.index', compact('title', 'datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $code = 'TRNSC'; // Set a fixed transaction code prefix
        $today = Carbon::now()->format('Ymd'); // Get today's date in 'YYYYMMDD' format using Carbon
        $prefix = $code . '-' . $today; // Combine the code and date to form a transaction prefix like 'TRNSC-20250903'
        $lasttransaction = Borrows::whereDate('created_at', Carbon::today()) // Filter Borrows records created today
            ->orderBy('id', 'desc') // Sort by ID in descending order to get the latest entry
            ->first(); // Retrieve the first (latest) record from the filtered results
        if ($lasttransaction) { // Check if a transaction was found for today
            $lastNumber = (int) substr($lasttransaction->trans_number, -3); // Extract the last 3 digits of the transaction number and convert to integer
            $newNumber = str_pad($lastNumber + 1, 3, "0", STR_PAD_LEFT); // Increment the number by 1 and pad it to 3 digits with leading zeros
        } else {
            $newNumber = '001'; // If no transaction exists for today, set the new number to 'Nol' (likely placeholder or default)
        }
        $trans_number = $prefix . $newNumber;
        $title = 'Tambah Transaksi';
        $members = Member::get();
        $categories = Categories::get();

        return view('admin.transactions.create', compact('title', 'members', 'categories', 'trans_number'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $insertBorrow = Borrows::create([
                'id_anggota' => $request->id_anggota,
                'trans_number' => $request->trans_number,
                'id_category' => $request->id_category,
                'note' => $request->note,
                'return_date' => $request->return_date
            ]);

            foreach ($request->id_buku as $key => $value) {
                DetailBorrows::create([
                    'id_borrows' => $insertBorrow->id,
                    'id_books' => $request->id_buku[$key]
                ]);
            }

            DB::commit();
            return redirect()->to('print/borrowed/', $insertBorrow->id);
        } catch (\Throwable $th) {
            DB::rollBack();
        }
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
        //
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
        //
    }

    public function getBukuByIdCategory($id_category)
    {
        try {
            $book = Book::where('id_category', $id_category)->get();
            return response()->json(['status' => 'success', 'message' => 'fetch berhasil', 'data' => $book]);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => $th->getMessage()], 500);
        }
    }

    public function print($id_borrow)
    {
        $borrow = Borrows::with('memberName', 'detailBorrow.books')->find($id_borrow);
        // $borrow = Borrows::find($id_borrow);
        return view('admin.transactions.print', compact('borrow'));
    }
}
