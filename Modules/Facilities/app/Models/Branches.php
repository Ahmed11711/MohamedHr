<?php

namespace Modules\Facilities\Models;

use Modules\CmsErp\Models\BranchType;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Facilities\Database\Factories\BranchesFactory;

class branches extends Model
{
    use HasFactory,HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];


    // protected static function newFactory(): BranchesFactory
    // {
    //     // return BranchesFactory::new();
    // }


   

}
