<?php

namespace Modules\CmsErp\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\CmsErp\Database\Factories\CompanyActivityFactory;

class CompanyActivity extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): CompanyActivityFactory
    // {
    //     // return CompanyActivityFactory::new();
    // }
}
