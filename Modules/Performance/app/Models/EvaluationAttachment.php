<?php

namespace Modules\Performance\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Performance\Database\Factories\EvaluationAttachmentFactory;

class EvaluationAttachment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): EvaluationAttachmentFactory
    // {
    //     // return EvaluationAttachmentFactory::new();
    // }
}
