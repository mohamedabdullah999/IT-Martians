<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'hero_title' => 'nullable|string|max:255',
            'hero_subtitle' => 'nullable|string|max:1000',
            'about_video_url' => 'nullable|url|max:2048',
            'about_text' => 'nullable|string|max:2000',

            'contact_address' => 'nullable|string|max:255',
            'contact_phone' => 'nullable|string|max:20',
            'contact_email' => 'nullable|email|max:255',

            'site_logo' => 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:2048',

            'social_facebook' => 'nullable|url|max:255',
            'social_twitter' => 'nullable|url|max:255',
            'social_linkedin' => 'nullable|url|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'hero_title.max' => 'العنوان الرئيسي لا يمكن أن يتجاوز 255 حرفاً.',
            'hero_subtitle.max' => 'النص الفرعي لا يمكن أن يتجاوز 1000 حرف.',
            'contact_email.email' => 'البريد الإلكتروني غير صالح.',
            'contact_phone.max' => 'رقم الهاتف لا يمكن أن يتجاوز 20 حرفاً.',
            'about_video_url.url' => 'رابط الفيديو "عن الشركة" غير صالح.',
            'social_facebook.url' => 'رابط فيسبوك غير صالح.',
            'social_twitter.url' => 'رابط تويتر غير صالح.',
            'social_linkedin.url' => 'رابط لينكدإن غير صالح.',

            'site_logo.image' => 'شعار الموقع يجب أن يكون ملف صورة.',
            'site_logo.mimes' => 'صيغة الشعار غير مدعومة. (المسموح: jpeg, png, jpg, svg, webp)',
            'site_logo.max' => 'حجم الشعار يجب ألا يتجاوز 2 ميجابايت.',
        ];
    }
}
