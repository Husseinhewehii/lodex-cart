<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BannerTranslation extends Model
{
    use SoftDeletes;
    protected $fillable =[
        "title",
        "description",
    ];
}
