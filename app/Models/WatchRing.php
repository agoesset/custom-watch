<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WatchRing extends Model
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
}
