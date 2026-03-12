<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ServiceRequest;
use App\Models\Service;
use App\Services\ServiceManager;
use App\Services\SettingManager;

class ServiceController extends Controller
{
    public function __construct(protected ServiceManager $serviceManager, protected SettingManager $settingManager) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = $this->serviceManager->getAllServicesForAdmin();
        $settings = $this->settingManager->getAllSettings();

        return view('admin.services.index', compact('services', 'settings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $settings = $this->settingManager->getAllSettings();

        return view('admin.services.create', compact('settings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceRequest $request)
    {
        $this->serviceManager->createService($request->validated());

        return redirect()->route('admin.services.index')->with('success', 'تم إضافة الخدمة بنجاح.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        $settings = $this->settingManager->getAllSettings();

        return view('admin.services.edit', compact('service', 'settings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceRequest $request, Service $service)
    {
        $settings = $this->settingManager->getAllSettings();
        $this->serviceManager->updateService($service, $request->validated());

        return redirect()->route('admin.services.index')->with('success', 'تم تحديث الخدمة بنجاح.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $this->serviceManager->deleteService($service);
        $settings = $this->settingManager->getAllSettings();

        return redirect()->route('admin.services.index')->with('success', 'تم حذف الخدمة بنجاح.');
    }
}
