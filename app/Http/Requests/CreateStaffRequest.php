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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        \Log::info("rules");
        \Log::ifo(request());
        return [
            'name'=> 'required',
            'email'=>'required',
            'address'=> 'required',
            'phone'=> 'required',
          
            // 'name'=> 'required|max:191|min:2', 
            // 'email'=>'required|email|unique:users|max:50|regex:/\A[^@\s]+@([^@.\s]+\.)+[^@.\s]+\z/',
            // 'password' => 'required|regex:/^.*(?=.{8,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/|max:15|confirmed',
            // 'position'=>'required|max:191|min:4',
            // 'role_id'=> 'required',
            // 'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:15',
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
