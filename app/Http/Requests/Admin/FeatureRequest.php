<?php

namespace App\Http\Requests\Admin;


use Illuminate\Foundation\Http\FormRequest;

class FeatureRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [];
        if ($this->isMethod('post')) {
            $rules["image"] = "required|image|max:50" ;
        }
        if (!$this->isMethod('put')) {
            $rules["image"] = "image|max:50" ;
        }

        foreach (config()->get("app.locales") as $lang => $language) {
            $rules[$lang.".*"] = "required" ;
        }

        return $rules ;
    }

}
