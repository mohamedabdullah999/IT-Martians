<?php

namespace App\Services;

use App\Models\Service;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class ServiceManager
{
    public function getFrontendServices()
    {
        return Cache::rememberForever('frontend_services', function () {
            return Service::latest()->get();
        });
    }

    public function getAllServicesForAdmin()
    {
        return Service::latest()->paginate(3);
    }

    public function createService(array $data)
    {
        if (isset($data['icon']) && $data['icon'] instanceof UploadedFile) {
            $path = $data['icon']->store('services', 'public');
            $data['icon'] = 'storage/'.$path;
        }

        $service = Service::create($data);
        $this->clearCache();

        return $service;
    }

    public function updateService(Service $service, array $data)
    {
        if (isset($data['icon']) && $data['icon'] instanceof UploadedFile) {

            if ($service->icon && str_starts_with($service->icon, 'storage/')) {
                $oldPath = str_replace('storage/', '', $service->icon);
                Storage::disk('public')->delete($oldPath);
            }

            $path = $data['icon']->store('services', 'public');
            $data['icon'] = 'storage/'.$path;

        } else {
            unset($data['icon']);
        }
        $service->update($data);
        $this->clearCache();

        return $service;
    }

    public function deleteService(Service $service)
    {
        if ($service->icon && str_starts_with($service->icon, 'storage/')) {
            $oldPath = str_replace('storage/', '', $service->icon);
            Storage::disk('public')->delete($oldPath);
        }

        $service->delete();
        $this->clearCache();
    }

    private function clearCache()
    {
        Cache::forget('frontend_services');
    }
}
