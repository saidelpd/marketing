<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class PasswordChangeRequest extends FormRequest
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
            'old_password' => 'required',
            'new_password' => 'required|min:6|confirmed'
        ];
    }

    protected function getValidatorInstance()
    {
        $validator = parent::getValidatorInstance();
            $validator->after(function () use ($validator) {
                if (!Hash::check($this->get('old_password'),  Auth::user()->password)) {
                    $validator->errors()->add('old_password', 'Invalid Password.');
                }
            });
        return $validator;
    }
}
