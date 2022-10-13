<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateStaffRequest extends FormRequest
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
            'name' => 'required|max:100',
            'email' => 'required|email|max:50|regex:/\A[^@\s]+@([^@.\s]+\.)+[^@.\s]+\z/',
            'address' => 'required|max:100',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:6|max:15',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name Field is required',
            'name.max' => 'Name field should be :max maximum long',
            'email.required' => 'Email Field is required!',
            'email.regex' => "Email format is invalid and format should be xxx@xx.xx",
            'email.max' => 'Email Field must be :max maximun long',
            'address.required' => 'Address Field is required',
            'address.max' => 'Address field should be :max maximum long',
            'phone.required' => 'Phone Field is required!',
            'phone.regex' => 'Phone format is invalid.Phone number must be number',
            'phone.min' => 'Phone number must be :min minnimun long',
            'phone.max' => 'Phone number must be :max maximun long',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $res = response()->json([
            'status' => 400,
            'errors' => $validator->errors(),
        ], 400);
        throw new HttpResponseException($res);
    }
}
