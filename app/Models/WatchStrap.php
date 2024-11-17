<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WatchStrap extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'desc',
    ];

    public function watchTypes()
    {
        return $this->belongsToMany(WatchType::class);
    }

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn($image) => url('/storage/' . $image),
        );
    }
}
