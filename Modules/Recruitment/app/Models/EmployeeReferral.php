<?php

namespace Modules\Recruitment\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Employee\Models\Employeeinfo;

// use Modules\Recruitment\Database\Factories\EmployeeReferralFactory;

class EmployeeReferral extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): EmployeeReferralFactory
    // {
    //     // return EmployeeReferralFactory::new();
    // }


    public function referringEmployee()
    {
        return $this->belongsTo(Employeeinfo::class, 'referring_employee_id');
    }



    public function candidate()
    {
        return $this->belongsTo(Candidate::class, 'candidate_id');
    }



    public function job()
    {
        return $this->belongsTo(JobVacancy::class, 'job_vacancie_id');
    }

}