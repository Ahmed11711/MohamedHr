<?php

namespace Modules\Recruitment\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\CmsErp\Models\Country;
use Modules\CmsErp\Models\Department;
use Modules\Employee\Models\Employeeinfo;
use Modules\CmsErp\Models\Qualification;
// use Modules\Recruitment\Database\Factories\JobVacancieFactory;

class JobVacancie extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): JobVacancieFactory
    // {
    //     // return JobVacancieFactory::new();
    // }


    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }



    public function qualification()
    {
        return $this->belongsTo(Qualification::class, 'qualification_id');
    }



    public function workLocation()
    {
        return $this->belongsTo(Country::class, 'work_location_id');
    }



    public function hiringManager()
    {
        return $this->belongsTo(Employeeinfo::class, 'hiring_manager_id');
    }



    public function recruitmentAttachment()
    {
        return $this->belongsTo(RecruitmentAttachment::class, 'recruitment_attachment_id');
    }

    public function skills()
    {
        return $this->hasMany(JobVacancieSkill::class, 'job_vacancie_id');
    }
    public function applications()
    {
        return $this->hasMany(ApplicationScreen::class, 'job_vacancie_id');
    }
}