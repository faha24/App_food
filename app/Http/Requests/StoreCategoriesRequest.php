<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoriesRequest extends FormRequest
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
          'name' => 'required|string|max:255|unique:categories,name',  // Tên danh mục bắt buộc, duy nhất và không vượt quá 255 ký tự
            'description' => 'nullable|string|max:500',  // Mô tả không bắt buộc, tối đa 500 ký tự
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên danh mục là bắt buộc.',
            'name.unique' => 'Tên danh mục này đã tồn tại.',
            'name.max' => 'Tên danh mục không được vượt quá 255 ký tự.',
            'description.max' => 'Mô tả không được vượt quá 500 ký tự.',
        ];
    }
}
