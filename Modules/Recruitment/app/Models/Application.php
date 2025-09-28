<?php

namespace Modules\Recruitment\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\CmsErp\Models\Nationality;
// use Modules\Recruitment\Database\Factories\ApplicationFactory;

class Application extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): ApplicationFactory
    // {
    //     // return ApplicationFactory::new();
    // }


    public function jobVacancy()
    {
        return $this->belongsTo(JobVacancy::class, 'job_vacancy_id');
    }



    public function nationality()
    {
        return $this->belongsTo(Nationality::class, 'nationality_id');
    }

}