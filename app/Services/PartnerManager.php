<?php

namespace App\Services;

use App\Models\Partner;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Cache;

class PartnerManager
{
    protected $cacheKey = 'active-partners';

    public function getAllPartnersForAdmin()
    {
        return Partner::latest()->paginate($perpage = 10);
    }

    public function getFrontendPartners()
    {
        return Cache::rememberForever($this->cacheKey, function () {
            return Partner::latest()->get();
        });
    }

    public function createPartner(array $data)
    {
        if (isset($data['logo']) && $data['logo'] instanceof UploadedFile) {
            $path = $data['logo']->store('partners', 'public');
            $data['logo'] = 'storage/'.$path;
        }

        $partner = Partner::create($data);
        $this->clearCache();

        return $partner;
    }

    public function updatePartner(Partner $partner, array $data)
    {
        if (issset($data['logo']) && $data['logo'] instanceof UploadedFile) {
            // Delete old logo if exists
            if ($partner->logo && str_starts_with($partner->logo, 'storage/')) {

                $oldPath = str_replace('storage/', '', $partner->logo);
                Storage::disk('public')->delete($oldPath);
            }

            $path = $data['logo']->store('partners', 'public');
            $data['logo'] = 'storage/'.$path;
        } else {
            unset($data['logo']);
        }

        $partner->update($data);
        $this->clearCache();

        return $partner;
    }

    public function deletePartner(Partner $partner)
    {
        if ($partner->logo && str_starts_with($partner->logo, 'storage/')) {
            $oldPath = str_replace('storage/', '', $partner->logo);
            Storage::disk('public')->delete($oldPath);
        }
        $partner->delete();
        $this->clearCache();
    }

    public function clearCache()
    {
        Cache::forget($this->cacheKey);
    }
}
