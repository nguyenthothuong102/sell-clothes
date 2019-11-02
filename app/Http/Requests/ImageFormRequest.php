<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageFormRequest extends FormRequest
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
            'name'  => 'required',
            'image' => 'required|image',

        ];
    }
    public function messages()
    {
        return[
            'name.required' => 'Tên hình ảnh không được để trống!',
            'image.required'    => 'File hình ảnh không được để trống!',
            'image.image'   => 'Không phải định dạng hình ảnh!'
        ];
    }
}
