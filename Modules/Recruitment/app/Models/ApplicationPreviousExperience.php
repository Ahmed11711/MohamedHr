<?php

namespace Modules\Recruitment\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Recruitment\Database\Factories\ApplicationPreviousExperienceFactory;

class ApplicationPreviousExperience extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): ApplicationPreviousExperienceFactory
    // {
    //     // return ApplicationPreviousExperienceFactory::new();
    // }
    public function application()
    {
        return $this->belongsTo(ApplicationScreen::class, 'application_id');
    }
}
