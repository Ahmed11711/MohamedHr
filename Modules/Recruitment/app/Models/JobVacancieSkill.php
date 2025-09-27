<?php

namespace Modules\Recruitment\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Recruitment\Database\Factories\JobVacancieSkillFactory;

class JobVacancieSkill extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): JobVacancieSkillFactory
    // {
    //     // return JobVacancieSkillFactory::new();
    // }


    public function jobVacancie()
    {
        return $this->belongsTo(JobVacancie::class, 'job_vacancie_id');
    }

}