<?php

namespace App\Http\Services;


use App\Models\Setting;
use Illuminate\Http\Request;


class SettingService
{
    protected $uploaderService;

    public function __construct(UploaderService $uploaderService)
    {
        $this->uploaderService = $uploaderService;
    }
    public function fillFromRequest(Request $request, $setting = null)
    {
        if (!$setting) {
            $setting = new Setting();
        }

        $setting->fill($request->all());
        $setting->active= $request->request->get('active', 0);


        if (!empty($request->file('value'))) {
            $image_path = $this->uploaderService->upload($request->file('value'), 'logos');
            foreach (config()->get("app.locales") as $key => $lang) {
                $setting->translate($key)->value = $image_path;
            }
        }

        $setting->save();

        return $setting;
    }
}
