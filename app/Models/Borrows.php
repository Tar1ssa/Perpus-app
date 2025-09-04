<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrows extends Model
{
    protected $fillable = [
        'id_anggota',
        'trans_number',
        'return_date',
        'note',
        'status'
    ];

    public function detailBorrow()
    {
        return $this->hasMany(DetailBorrows::class, 'id_borrows', 'id');
    }

    public function memberName()
    {
        return $this->belongsTo(Member::class, 'id_anggota', 'id');
    }
}
