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
        return $this->belongsToMany(WatchCase::class, 'watch_case_watch_type');
    }

    public function watchDials()
    {
        return $this->belongsToMany(WatchDial::class);
    }

    public function watchRings()
    {
        return $this->belongsToMany(WatchRing::class);
    }

    public function watchStraps()
    {
        return $this->belongsToMany(WatchStrap::class);
    }
}
