<?php

namespace Modules\Recruitment\Models;

use Modules\Recruitment\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// use Modules\Recruitment\Database\Factories\AhmedFactory;

class Ahmed extends BaseModel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): AhmedFactory
    // {
    //     // return AhmedFactory::new();
    // }


    // public function recruitmentAttachments()
    // {
    //     return $this->belongsTo(RecruitmentAttachments::class, 'recruitment_attachments_id');
    // }

}
