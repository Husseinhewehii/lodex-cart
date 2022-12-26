<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\FeatureRequest;
use App\Models\Feature;
use App\Http\Controllers\BaseController;
use App\Http\Services\FeatureService;
use App\Repositories\FeatureRepository;
use Illuminate\Http\Request;
use View;

class FeatureController extends BaseController
{

    protected $featureRepository;
    protected $featureService;


    /**
     * FeatureController constructor.
     * @param FeatureRepository $featureRepository
     * @param FeatureService $featureService
     */
    public function __construct(FeatureRepository $featureRepository, FeatureService $featureService)
    {
        $this->authorizeResource(Feature::class, "feature");
        $this->featureService = $featureService;
        $this->featureRepository = $featureRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize("index", Feature::class);
        $features = $this->featureRepository->getAllFeatures();
        return View::make('admin.features.index', ['features' => $features]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function edit(Feature $feature)
    {
        return View::make('admin.features.edit', ['feature' => $feature]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function update(FeatureRequest $request,Feature $feature)
    {
        $this->featureService->fillFromRequest($request, $feature);

        return redirect(route('admin.features.index'))->with('success', trans('item_updated_successfully'));
    }

}
