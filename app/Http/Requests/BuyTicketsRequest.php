<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuyTicketsRequest extends FormRequest
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
            'checkout_name'=>'required|max:255',
            'checkout_last_name'=>'required|max:255',
            'checkout_phone'=>'required|max:20',
            'checkout_quantity'=>'required|integer|min:1'
        ];
    }

    /**
     * Change default messages
     */
    public function messages()
    {
        return [
            'checkout_name.required'=>'We need to know your name!',
            'checkout_last_name.required'=>'We need to know your last name!',
            'checkout_phone.required'=>'We need to know your phone!',
        ];
    }


}
