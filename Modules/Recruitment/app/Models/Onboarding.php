<?php

namespace Modules\Recruitment\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Recruitment\Database\Factories\OnboardingFactory;

class Onboarding extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): OnboardingFactory
    // {
    //     // return OnboardingFactory::new();
    // }


    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }



    public function national()
    {
        return $this->belongsTo(National::class, 'national_id');
    }

}