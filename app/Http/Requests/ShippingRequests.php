<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShippingRequests extends FormRequest
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
            'shipping_name' => 'required',
            'shipping_city' => 'required',
            'shipping_address'  => 'required',
            'shipping_phone'  => 'required|numeric|min:10',
            'shipping_email'  => 'required',
            'shipping_note'  => 'required|min:10|max:255',
        ];
    }
    public function messages()
    {
        return[
            'shipping_name.required' => 'Tên không được để trống',
            'shipping_city.required' => 'Vui lòng nhập tên thành phố',
            'shipping_address.required' => 'Vui lòng nhập địa chỉ',
            'shipping_phone.required' => 'Vui lòng nhập số điện thoại',
            'shipping_email.required|email' => 'Vui lòng nhập email',
            'shipping_note.required|min' => 'Vui lòng để lại ghi chú, tối thiếu 10 kí tự'
        ];
    }
}
