<?php

namespace Modules\Recruitment\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Recruitment\Database\Factories\CandidateCommunicationFactory;

class CandidateCommunication extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): CandidateCommunicationFactory
    // {
    //     // return CandidateCommunicationFactory::new();
    // }
}
