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

    protected static function boot()
    {
        parent::boot();

        // Hapus gambar saat model dihapus
        static::deleting(function ($product) {
            if (!empty($product->image)) {
                foreach ($product->image as $image) {
                    Storage::disk('public')->delete($image);
                }
            }
        });

        // Hapus gambar lama saat model diupdate dengan gambar baru
        static::updating(function ($product) {
            if ($product->isDirty('image') && !empty($product->getOriginal('image'))) {
                foreach ($product->getOriginal('image') as $oldImage) {
                    Storage::disk('public')->delete($oldImage);
                }
            }
        });
    }

    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
