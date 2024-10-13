<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'price',
        'qty',
        'desc',
        'color',
    ];

    protected $casts = [
        'image' => 'array',
        'color' => 'array',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
