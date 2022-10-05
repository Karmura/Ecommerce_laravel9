<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

class Movie extends Model
{
    use HasFactory;
    protected $fillable=[
        'movie',
        'item_id',
    ];

    public function items()
    {
        return $this->belongsTo(Item::class);
    }
}
