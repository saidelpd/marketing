<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'name'=>'required|max:255',
            'last_name'=>'required|max:255',
            'phone'=>'required|max:15',
            'address'=>'required|max:255',
            'city'=>'required|max:50',
            'state'=>'required|max:3',
            'zip'=>'required|max:10'
        ];
    }
}
