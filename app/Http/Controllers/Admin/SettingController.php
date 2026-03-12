<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\UpdateSettingRequest;
use App\Services\SettingManager;

class SettingController extends Controller
{
    public function __construct(protected SettingManager $settingManager)
    {}

    public function index()
    {
        $settings = $this->settingManager->getAllSettings();
        return view('admin.settings.index', compact('settings'));
    }

    public function update(UpdateSettingRequest $request)
    {
        $this->settingManager->updateSettings($request->validated());
        return redirect()->back()->with('success', 'تم تحديث الإعدادات بنجاح.');
    }
}
