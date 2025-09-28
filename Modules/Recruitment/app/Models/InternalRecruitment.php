<?php

namespace Modules\Recruitment\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Recruitment\Database\Factories\InternalRecruitmentFactory;

class InternalRecruitment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): InternalRecruitmentFactory
    // {
    //     // return InternalRecruitmentFactory::new();
    // }
}
