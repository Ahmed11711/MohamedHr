<?php

namespace Modules\Recruitment\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Employee\Models\Qualification;
// use Modules\Recruitment\Database\Factories\JobVacancyFactory;

class JobVacancy extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): JobVacancyFactory
    // {
    //     // return JobVacancyFactory::new();
    // }



 



    public function dpartment()
    {
        return $this->belongsTo(Department::class, 'dpartment_id');
    }



    public function qualification()
    {
        return $this->belongsTo(Qualification::class, 'qualification_id');
    }



    public function workLocation()
    {
        return $this->belongsTo(WorkLocation::class, 'work_location_id');
    }



    public function hiringManager()
    {
        return $this->belongsTo(HiringManager::class, 'hiring_manager_id');
    }

}