<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PartnerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $logoRule = $this->isMethod('POST')
                    ? 'required|image|mimes:jpeg,png,jpg,svg,webp|max:2048'
                    : 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:2048';

        return [
            'name' => 'required|string|max:255',
            'logo' => $logoRule,
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'اسم الشريك مطلوب.',
            'logo.required' => 'يرجى رفع لوجو الشريك.',
            'logo.image' => 'الملف المرفوع يجب أن يكون صورة.',
            'logo.mimes' => 'صيغة الصورة غير مدعومة. الصيغ المدعومة: jpeg, png, jpg, svg, webp.',
            'logo.max' => 'حجم الصورة يجب ألا يتجاوز 2 ميجابايت.',
        ];
    }
}
