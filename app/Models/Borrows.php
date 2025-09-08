<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Borrows extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'id_anggota',
        'trans_number',
        'return_date',
        'note',
        'status'
    ];

    protected $date = ['deleted_at'];

    public function detailBorrow()
    {
        return $this->hasMany(DetailBorrows::class, 'id_borrows', 'id');
    }

    public function memberName()
    {
        return $this->belongsTo(Member::class, 'id_anggota', 'id');
    }
}
