<?php

namespace Modules\Employee\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Employee\Database\Factories\EmployeeinfoFactory;

class Employeeinfo extends Model
{
     use HasFactory, HasTranslations;

    protected $fillable = [
        'firstName',
        'secondName',
        'thirdName',
        'lastName',
    ];

    public $translatable = [
        'firstName',
        'secondName',
        'thirdName',
        'lastName',
    ];


    // protected static function newFactory(): EmployeeinfoFactory
    // {
    //     // return EmployeeinfoFactory::new();
    // }
}
