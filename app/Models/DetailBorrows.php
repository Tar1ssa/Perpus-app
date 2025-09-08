<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailBorrows extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'id_borrows',
        'id_books'
    ];

    protected $date = ['deleted_at'];

    public function borrow()
    {
        return $this->belongsTo(Borrows::class, 'id_borrows', 'id');
    }

    public function books()
    {
        return $this->belongsTo(Book::class, 'id_books', 'id');
    }
}
