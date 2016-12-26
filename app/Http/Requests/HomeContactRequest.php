<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomeContactRequest extends FormRequest
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
          'contact_name'=>'required',
          'contact_email'=>'required|email',
          'contact_message'=>'required',
        ];

    }

    /**
     * Change default messages
     */
    public function messages()
    {
        return [
            'contact_name.required'=>'We need to know your name!',
            'contact_email.required'=>'We need to know your e-mail address!',
            'contact_email.email'=>"The email must be a valid email address.",
            'contact_message.required'=>'The message field is required.',
        ];
    }
}
