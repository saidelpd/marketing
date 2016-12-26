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
            'stripeToken'=>'required',
            'stripeEmail'=>'required|email',
            'checkout_name'=>'required',
            'checkout_last_name'=>'required',
            'checkout_phone'=>'required',
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
            'checkout_phone.required'=>'We need to know your e-mail address!',
        ];
    }


}
