<?php

namespace Modules\Training\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Training\Database\Factories\GamificationForTrainingFactory;

class GamificationForTraining extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): GamificationForTrainingFactory
    // {
    //     // return GamificationForTrainingFactory::new();
    // }
}
