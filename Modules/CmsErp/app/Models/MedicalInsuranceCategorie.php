<?php

namespace Modules\CmsErp\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\CmsErp\Database\Factories\MedicalInsuranceCategorieFactory;

class MedicalInsuranceCategorie extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): MedicalInsuranceCategorieFactory
    // {
    //     // return MedicalInsuranceCategorieFactory::new();
    // }
}
