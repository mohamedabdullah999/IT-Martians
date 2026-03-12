<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Service;
use App\Services\SettingManager;

class DashboardController extends Controller
{
    public function __construct(protected SettingManager $settingManager) {}

    public function index()
    {
        $stats = [
            'products' => Product::count(),
            'partners' => Partner::count(),
            'services' => Service::count(),
            'messages' => Message::count(),
        ];

        $settings = $this->settingManager->getAllSettings();

        return view('admin.dashboard', compact('stats', 'settings'));
    }
}
