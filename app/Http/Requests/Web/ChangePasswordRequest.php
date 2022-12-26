<?php

namespace App\Http\Requests\Web;

use App\Rules\authenticateUser;
use Illuminate\Foundation\Http\FormRequest;
use \App\Constants\UserTypes as UserTypes;

class ChangePasswordRequest extends FormRequest
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
        return [
            'current_password' => ['required',new authenticateUser],
            'new_password' => 'required|min:8|max:100|',
            'confirm_new_password' => 'required_with:new_password|same:new_password|min:8|max:100|',
        ];
    }

    public function messages()
    {
        return[
            'current_password.required' => 'Current Password is required',
            'new_password.required' => 'New Password is required',
            'confirm_new_password.required_with' => 'Please confirm Your New Passowrd',
            'confirm_new_password.same' => 'New Password Mismatch'

        ];
    }

}
