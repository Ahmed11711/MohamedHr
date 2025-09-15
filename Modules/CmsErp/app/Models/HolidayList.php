<?php

namespace Modules\CmsErp\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\CmsErp\Database\Factories\HolidayListFactory;

class HolidayList extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): HolidayListFactory
    // {
    //     // return HolidayListFactory::new();
    // }
}
