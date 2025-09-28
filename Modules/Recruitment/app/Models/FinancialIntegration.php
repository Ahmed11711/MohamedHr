<?php

namespace Modules\Recruitment\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Recruitment\Database\Factories\FinancialIntegrationFactory;

class FinancialIntegration extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): FinancialIntegrationFactory
    // {
    //     // return FinancialIntegrationFactory::new();
    // }
}
