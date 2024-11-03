<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'price',
        'qty',
        'description',
        'specification',
        'material',
        'color',
    ];

    protected $casts = [
        'image' => 'array',
        'color' => 'array',
    ];

    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }

    protected static function booted()
    {
        static::deleting(function ($product) {
            // Hapus semua gambar terkait ketika produk dihapus
            if ($product->image && is_array($product->image)) {
                foreach ($product->image as $imagePath) {
                    Storage::delete('products/' . $imagePath);
                }
            }
        });
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
