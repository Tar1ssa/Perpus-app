<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailBorrows extends Model
{
    protected $fillable = [
        'id_borrows',
        'id_books'
    ];

    public function borrow()
    {
        return $this->belongsTo(Borrows::class, 'id_borrows', 'id');
    }

    public function books()
    {
        return $this->belongsTo(Book::class, 'id_books', 'id');
    }
}
