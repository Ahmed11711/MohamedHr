<?php

namespace Modules\Facilities\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Translatable\HasTranslations;
// use Modules\Facilities\Database\Factories\FacilitiesFactory;

class Facilities extends Model
{
    use HasFactory, HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    public $translatable = ['key', 'label'];
}
