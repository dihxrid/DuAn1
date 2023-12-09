<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InfoCustomer extends FormRequest
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
            'customer_name' => 'required',
            'customer_password' => 'required_with:customer_password_comfirmation|same:customer_password_comfirmation|min:6',
            'customer_password_comfirmation' => 'min:6',
            'customer_email' => 'required|email',
            'customer_phone' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'customer_name.required' => 'Tên người dùng không được để trống',
            'customer_password.required' => 'Mật khẩu không được để trống',
            'customer_email.required' => 'Email không được bỏ trống',
            'customer_phone.required' => 'SĐT không được bỏ trống',
        ];
    }
}
