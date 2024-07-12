<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ValidateUpdateProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255|min:2',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            "expiry_date" => 'required',
            'category_id' => 'nullable|exists:App\Models\Category,id',
            'price' => 'required',
            'quantity' => 'required',
            'description' => 'required',
            'short_description' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên sản phẩm không được để trống',
            'name.max' => 'Tên sản phẩm không được vượt quá 255 ký tự',
            'name.min' => 'Tên sản phẩm tối thiểu 2 ký tự',
            'image.image' => 'Định dạng ảnh không đúng',
            'image.mimes' => 'Định dạng ảnh không đúng',
            'image.max' => 'Kích thước ảnh quá lớn',
            'expiry_date.required' => 'Ngày hết hạn không được để trống',
            'price.required' => 'Giá sản phẩm không được để trống',
            'quantity.required' => 'Số lượng sản phẩm không được để trống',
            'description.required' => 'Mô tả sản phẩm không được để trống',
            'short_description.required' => 'Mô tả ngắn sản phẩm không được để trống',
            'category_id.exists' => 'Danh mục sản phẩm không tồn tại.',
        ];
    }
}
