<?php

namespace Modules\Performance\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Performance\Database\Factories\FeedbackAttachmentsFactory;

class FeedbackAttachment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): FeedbackAttachmentsFactory
    // {
    //     // return FeedbackAttachmentsFactory::new();
    // }
}
