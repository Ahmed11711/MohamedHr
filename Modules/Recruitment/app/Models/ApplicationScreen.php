<?php

namespace Modules\Recruitment\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Recruitment\Database\Factories\ApplicationScreenFactory;

class ApplicationScreen extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): ApplicationScreenFactory
    // {
    //     // return ApplicationScreenFactory::new();
    // }


    public function jobVacancy()
    {
        return $this->belongsTo(\Modules\Recruitment\Models\JobVacancie::class, 'job_vacancie_id');
    }

    public function country()
    {
        return $this->belongsTo(\Modules\CmsErp\Models\Country::class, 'nationality_id');
    }


    public function nationality()
    {
        return $this->belongsTo(Nationality::class, 'nationality_id');
    }

}