<?php

namespace Modules\Performance\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Performance\Database\Factories\PerformanceAnalytiAttatchmentFactory;

class PerformanceAnalyticAttatchment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): PerformanceAnalytiAttatchmentFactory
    // {
    //     // return PerformanceAnalytiAttatchmentFactory::new();
    // }
}
