<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'id_location',
        'id_category',
        'title',
        'writer',
        'publisher',
        'publish_year',
        'description',
        'stock'
    ];

    public function category()
    {
        return $this->belongsTo(Categories::class, 'id_category', 'id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'id_location', 'id');
    }
}
