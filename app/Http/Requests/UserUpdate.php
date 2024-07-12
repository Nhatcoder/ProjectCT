<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdate extends FormRequest
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
            "avatar" => "image|mimes:jpeg,png,jpg,gif,svg|max:5000",
        ];
    }

    public function messages(): array
    {
        return [
            'avatar.image' => 'Định dạng ảnh không đúng',
            'avatar.mimes' => 'Định dạng ảnh không đúng',
            'avatar.max' => 'Kích thước ảnh quá lớn',
        ];
    }
}
