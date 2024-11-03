<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WatchType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function watchCases()
    {
        return $this->belongsToMany(WatchCase::class, 'watch_type_case');
    }

    public function watchDials()
    {
        return $this->belongsToMany(WatchDial::class, 'watch_type_dial');
    }

    public function watchRings()
    {
        return $this->belongsToMany(WatchRing::class, 'watch_type_ring');
    }

    public function watchStraps()
    {
        return $this->belongsToMany(WatchStrap::class, 'watch_type_strap');
    }
}
