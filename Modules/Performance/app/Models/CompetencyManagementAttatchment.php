<?php

namespace Modules\Performance\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Performance\Database\Factories\CompetencyManagementAttatchmentFactory;

class CompetencyManagementAttatchment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): CompetencyManagementAttatchmentFactory
    // {
    //     // return CompetencyManagementAttatchmentFactory::new();
    // }
}
