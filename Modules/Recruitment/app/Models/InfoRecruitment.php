<?php

namespace Modules\Recruitment\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Recruitment\Database\Factories\InfoRecruitmentFactory;

class InfoRecruitment extends Model
{
    use HasFactory,HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];
  protected $casts = [
        'title' => 'array',
        'desc'  => 'array',
    ];
            public $translatable = ['title', 'desc'];

    // protected static function newFactory(): InfoRecruitmentFactory
    // {
    //     // return InfoRecruitmentFactory::new();
    // }
}
