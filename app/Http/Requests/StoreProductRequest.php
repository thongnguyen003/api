<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => 'required|string|max:255', // Tên sản phẩm bắt buộc, chuỗi và tối đa 255 ký tự
            'description' => 'nullable|string', // Mô tả có thể để trống, nếu có thì là chuỗi
            'price' => 'required|numeric|min:0', // Giá bắt buộc, kiểu số và phải lớn hơn hoặc bằng 0
            'quantity' => 'required|integer|min:1'
        ];
    }
    public function messages(){
        return [
            'name.required'=>'Vui lòng nhập tên dữ liệu vào ô',
            'name.string'=>'Vui là nhập đúng kiểu dữ liệu dạng String',
            'avatar.required'=>'Vui lòng chọn ảnh đại diện',
            'avatar.file'=>'Vui là ảnh được chọn phải là một tệp(file) hợp lệ',
            'avatar.image'=>'Vui lòng chọn ảnh phải là một hình ảnh',
            'avatar.mine'=>'Vui longd ảnh được chọn phải thuộc các loại có phần mở rộng jpeg,png,jpg,gif,webp'
        ];
    }
}
