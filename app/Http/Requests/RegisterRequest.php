<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'email'      => 'required|email|max:255|unique:users',
            'last_name'  => 'required|min:2|max:10|nullable',
            'first_name' => 'required|min:2|max:10|nullable',
            'address'   => 'required|string',
            'tel'       => 'required|string',
            'password'   => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required'     => 'Vui lòng nhập địa chỉ email',
            'email.email'        => 'Địa chỉ email không hợp lệ',
            'email.unique'       => 'Địa chỉ này email đã tồn tại',
            'last_name.required'      => 'Bạn phải nhập họ',
            'first_name.required'      => 'Bạn phải nhập tên',
            'last_name.min'      => 'Họ phải có ít nhất 2 ký tự',
            'last_name.max'      => 'Họ không được quá 10 ký tự',
            'first_name.min'     => 'Tên phải có ít nhất 2 ký tự',
            'first_name.max'     => 'Tên không được quá 10 ký tự',
            'tel.required'   => ' Phải nhập số điện thoại',
            'address.required'   => ' Phải nhập địa chỉ',
            'password.required'  => 'Vui lòng nhập mật khẩu',
            'password.min'       => 'Mật khẩu phải có ít nhất 6 ký tự',
            'password_confirmation.required' => 'Bạn phải nhập lại mật khẩu',
            'password.confirmed' => 'Mật khẩu không trùng khớp',
        ];
    }
}
