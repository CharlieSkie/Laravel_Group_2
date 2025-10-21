<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    // ✅ Tell Laravel your table name (since it's singular)
    protected $table = 'food';

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
    ];
}
