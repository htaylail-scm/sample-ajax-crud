<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateStaffRequest extends FormRequest
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
        \Log::info("rules");
        \Log::info(request());
        return [
            'name'=> 'required',
            'email'=>'required',
            'address'=> 'required',
            'phone'=> 'required',         
           
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name Field is required!',
            'email.required' => 'Email Field is required!',
            'address.required' => 'Address Field is required!',
            'phone.required' => 'Phone Field is required!',
        ];
    }
}
