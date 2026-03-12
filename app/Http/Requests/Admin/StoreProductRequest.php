<?php

namespace App\Http\Requests\Admin;

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
        $imageRule = $this->isMethod('POST')
                    ? 'required|image|mimes:jpeg,png,jpg,svg,webp|max:2048'
                    : 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:2048';

        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000', // خليتها nullable عشان ممكن العميل ميكتبش وصف
            'image' => $imageRule,
            'link' => 'nullable|url|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'اسم المنتج مطلوب.',
            'name.string' => 'اسم المنتج يجب أن يكون نصاً.',
            'name.max' => 'اسم المنتج لا يمكن أن يتجاوز 255 حرفاً.',
            'description.max' => 'وصف المنتج لا يمكن أن يتجاوز 1000 حرفاً.',
            'image.required' => 'يرجى رفع صورة للمنتج.',
            'image.image' => 'الملف المرفوع يجب أن يكون صورة.',
            'image.mimes' => 'صيغة الصورة غير مدعومة. الصيغ المدعومة: jpeg, png, jpg, svg, webp.',
            'image.max' => 'حجم الصورة يجب ألا يتجاوز 2 ميجابايت.',
            'link.url' => 'الرابط غير صالح.',
            'description.required' => 'وصف المنتج مطلوب.',
            'link.max' => 'الرابط لا يمكن أن يتجاوز 255 حرفاً.',
        ];
    }
}
