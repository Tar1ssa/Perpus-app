<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrows;
use App\Models\DetailBorrows;
use Illuminate\Http\Request;

class HomeControllers extends Controller
{
    public function index()
    {

        $totalbook = Book::count();
        $totalstock = Book::sum('stock');
        $dipinjam = DetailBorrows::with('books', 'borrow')->whereHas('borrow', function ($q) {
            $q->whereNull('actual_return_date');
        })->count();

        $dikembalikan = Borrows::where('status', 0)->whereNotNull('actual_return_date')->count();
        $tidakdikembalikan = Borrows::where('status', 1)->whereNull('actual_return_date')->count();

        $fines = Borrows::where('fine', '>', 0)->get();
        $totalfines = Borrows::sum('fine');
        return view('admin.dashboard', compact('totalbook', 'totalstock', 'dipinjam', 'dikembalikan', 'tidakdikembalikan', 'fines', 'totalfines'));
    }
}
