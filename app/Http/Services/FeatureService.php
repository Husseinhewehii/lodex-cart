<?php

namespace App\Http\Services;

use App\Models\Feature;
use Symfony\Component\HttpFoundation\Request;

class FeatureService
{

    /**
     * @var UploaderService
     */
    private $uploaderService;

    /**
     * FeatureService constructor.
     * @param UploaderService $uploaderService
     */
    public function __construct(UploaderService $uploaderService)
    {
        $this->uploaderService = $uploaderService;
    }

    /**
     * @param Request $request
     * @param null $feature
     * @return Feature|null
     */
    public function fillFromRequest(Request $request, $feature)
    {
        if (!$feature) {
            return false;
        }
        $feature->fill($request->all());
        if ($request->hasFile('icon')) {
            $feature->icon = $this->uploaderService->upload($request->file('icon'), 'features');
        }
        $feature->active = $request->input("active",0);

        $feature->save();
        return $feature;
    }


}
