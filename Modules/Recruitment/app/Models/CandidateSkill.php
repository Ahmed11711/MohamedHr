<?php

namespace Modules\Recruitment\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Recruitment\Database\Factories\CandidateSkillFactory;

class CandidateSkill extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): CandidateSkillFactory
    // {
    //     // return CandidateSkillFactory::new();
    // }


    public function candidate()
    {
        return $this->belongsTo(Candidate::class, 'candidate_id');
    }

}