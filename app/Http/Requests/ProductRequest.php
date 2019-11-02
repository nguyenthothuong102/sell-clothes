<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name_product'   => 'required',
            'brand_product'     => 'required',
            'description'    => 'required',
            'quantity'       => 'required|numeric',
            'price'          => 'required|numeric',
            'category_id'    => 'required',
            'name_image'=>'required',
            'images'         => 'required|array',
            'images.*'         => 'image',
            'size'         => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name_product.required'   => 'Tên sp không được để trống!',
            'brand_product'           =>'Hãng không được bỏ trống!',
            'name_image.required'     => 'Tên hình ảnh không được để trống!',
            'description.required'    => 'Mô tả sản phẩm không được để trống!',
            'quantity.required'       => 'Số lượng không được để trống!',
            'quantity.numeric'        => 'Số lượng phải là một số!',
            'price.required'          => 'Giá không được để trống!',
            'price.numeric'           => 'Giá phải là một số!',
            'category_id.required'    => 'Danh mục không được để trống!',
            'images.required'         => 'Trường hình ảnh không được để trống!',
            'images.image'            => 'Không phải là hình ảnh!',
            'size.required'         => 'Size không được để trống!',
        ];
    }
}
