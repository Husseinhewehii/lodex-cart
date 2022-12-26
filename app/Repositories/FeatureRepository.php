<?php

namespace App\Repositories;

use App\Models\Feature;
use Auth;

class FeatureRepository
{
    public function getAllFeatures()
    {
        $features = Feature::all();
        return $features;
    }

    public function getActiveFeatures($request)
    {
        $features = Feature::orderBy('id', 'DESC')
            ->when($request->get('active'), function ($features) use ($request) {
                return $features->where('active', '=', $request->get('active'));
            });

        return $features;
    }
}
