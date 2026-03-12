<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
{
    /**
     * Determine if the user is autho   rized to make this request.
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
        $iconRule = $this->isMethod('POST')
                    ? 'required|image|mimes:jpeg,png,jpg,svg,webp|max:2048'
                    : 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:2048';

        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => $iconRule,
            'link' => 'nullable|url|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'حقل العنوان مطلوب.',
            'description.required' => 'حقل الوصف مطلوب.',
            'icon.required' => 'يرجى رفع صورة/أيقونة للخدمة.',
            'icon.image' => 'الملف المرفوع يجب أن يكون صورة.',
            'icon.mimes' => 'صيغة الصورة غير مدعومة. الصيغ المدعومة: jpeg, png, jpg, svg, webp.',
            'icon.max' => 'حجم الصورة يجب ألا يتجاوز 2 ميجابايت.',
            'link.url' => 'الرابط غير صالح.',
            'link.max' => 'الرابط لا يمكن أن يتجاوز 255 حرفاً.',
        ];
    }
}
