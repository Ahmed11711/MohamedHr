<?php

namespace Modules\CmsErp\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\CmsErp\Database\Factories\HeadquarterFactory;

class Headquarter extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): HeadquarterFactory
    // {
    //     // return HeadquarterFactory::new();
    // }
}
