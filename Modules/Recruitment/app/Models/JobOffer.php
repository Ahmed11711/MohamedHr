<?php

namespace Modules\Recruitment\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Recruitment\Database\Factories\JobOfferFactory;

class JobOffer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): JobOfferFactory
    // {
    //     // return JobOfferFactory::new();
    // }


    public function candidate()
    {
        return $this->belongsTo(Candidate::class, 'candidate_id');
    }

}