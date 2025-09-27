<?php

namespace Modules\Recruitment\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Recruitment\Database\Factories\RecruitmentAttachmentFactory;

class RecruitmentAttachment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];

    // protected static function newFactory(): RecruitmentAttachmentFactory
    // {
    //     // return RecruitmentAttachmentFactory::new();
    // }
}
