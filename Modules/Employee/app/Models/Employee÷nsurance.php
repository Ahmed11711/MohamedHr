<?php

namespace Modules\Employee\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Employee\Database\Factories\Employee÷nsuranceFactory;

class Employee÷nsurance extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): Employee÷nsuranceFactory
    // {
    //     // return Employee÷nsuranceFactory::new();
    // }
}
