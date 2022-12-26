<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    use SoftDeletes;
    use Translatable;

    protected $fillable = [
        'key',
        'active',
    ];

    public $translatedAttributes = [
        "value"
    ];

    protected $appends = ['value'];

    public function getValueAttribute()
    {
        return $this->getTranslationByLocaleKey(app()->getLocale())->value;
    }

    static public function getSettingByKey($key)
    {
        return Setting::where('key', '=', $key)->first();
    }
}
