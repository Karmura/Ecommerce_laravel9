<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Movie;

class Item extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'body',
        'cover'
    ];

    public function movies()
    {
        return $this->hasMany(Movie::class);
    }
}
