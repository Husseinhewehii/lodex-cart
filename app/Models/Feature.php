<?php

namespace App\Models;

use App\Events\FeatureEditedEvent;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;


class Feature extends Model
{
    use Translatable;

    public $translatedAttributes = [
        'title',
        "description",
    ];

    protected $fillable = [
        "icon",
        "active",
    ];

    public $dispatchesEvents = [
        'updated' => FeatureEditedEvent::class,
    ];
}
