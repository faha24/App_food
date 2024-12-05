<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategoriesRequest extends FormRequest
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
        $Id = $this->route('id');
        return [
            'name' => ['required','string','max:255',Rule::unique('categories')->ignore($Id)],  // Tên danh mục bắt buộc, duy nhất và không vượt quá 255 ký tự
            'description' => 'nullable|string|max:500',
        ];
    }
}
