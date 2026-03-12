<?php

namespace App\Services;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class SettingManager
{
    protected $cacheKey = 'site_settings';

    public function getAllSettings()
    {
        return Cache::rememberForever($this->cacheKey, function () {
            return Setting::pluck('value', 'key')->toArray();
        });
    }

    public function updateSettings(array $data)
    {
        $logoKey = 'site_logo';

        if (isset($data[$logoKey]) && $data[$logoKey] instanceof \Illuminate\Http\UploadedFile) {

            $oldSetting = Setting::where('key', $logoKey)->first();

            if ($oldSetting && $oldSetting->value && str_starts_with($oldSetting->value, 'storage/')) {

                $oldPath = str_replace('storage/', '', $oldSetting->value);
                Storage::disk('public')->delete($oldPath);

            }

            $path = $data[$logoKey]->store('settings', 'public');
            $data[$logoKey] = 'storage/'.$path;
        } else {
            if (array_key_exists($logoKey, $data)) {
                unset($data[$logoKey]);
            }
        }

        foreach ($data as $key => $value) {

            if ($value !== null) {
                Setting::updateOrCreate(
                    ['key' => $key],
                    ['value' => $value]
                );
            }
        }

        Cache::forget($this->cacheKey);
    }
}
