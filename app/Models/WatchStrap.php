<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class WatchStrap extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'desc',
        'price',
    ];

    public function watchTypes()
    {
        return $this->belongsToMany(WatchType::class);
    }

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn($image) => $image, // Hanya kembalikan path relatif
        );
    }

    protected static function boot()
    {
        parent::boot();

        static::updated(function ($model) {
            if ($model->wasChanged('image') && $model->getOriginal('image')) {
                // Hapus file lama setelah model diperbarui
                Storage::disk('public')->delete($model->getOriginal('image'));
            }
        });
    }
}
