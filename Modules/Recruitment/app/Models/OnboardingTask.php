<?php

namespace Modules\Recruitment\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\CmsErp\Models\Department;
use Modules\Recruitment\Models\Onboarding;

// use Modules\Recruitment\Database\Factories\OnboardingTaskFactory;

class OnboardingTask extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): OnboardingTaskFactory
    // {
    //     // return OnboardingTaskFactory::new();
    // }


    public function onboarding()
    {
        return $this->belongsTo(Onboarding::class, 'onboarding_id');
    }



    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

} 