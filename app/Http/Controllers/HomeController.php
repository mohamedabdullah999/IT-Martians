<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SettingManager;
use App\Services\ServiceManager;
use App\Services\ProductManager;
use App\Services\PartnerManager;

use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index(PartnerManager $partnerManager, ServiceManager $serviceManager, ProductManager $productManager, SettingManager $settingManager)
    {
        $services = $serviceManager->getFrontendServices();
        $products = $productManager->getFrontendProducts();
        $partners = $partnerManager->getFrontendPartners();
        $settings = $settingManager->getAllSettings();

        return view('welcome' , compact('services', 'products', 'partners', 'settings'));
    }
}
