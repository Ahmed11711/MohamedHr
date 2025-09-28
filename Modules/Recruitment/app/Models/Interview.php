<?php

namespace Modules\Recruitment\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Recruitment\Database\Factories\InterviewFactory;

class Interview extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): InterviewFactory
    // {
    //     // return InterviewFactory::new();
    // }


    public function application()
    {
        return $this->belongsTo(Application::class, 'application_id');
    }

}