<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PartnerRequest;
use App\Models\Partner;
use App\Services\PartnerManager;
use App\Services\SettingManager;

class PartnerController extends Controller
{
    public function __construct(protected PartnerManager $partnerManager, protected SettingManager $settingManager) {}

    public function index()
    {
        $settings = $this->settingManager->getAllSettings();
        $partners = $this->partnerManager->getAllPartnersForAdmin();

        return view('admin.partners.index', compact('partners', 'settings'));
    }

    public function create()
    {
        $settings = $this->settingManager->getAllSettings();

        return view('admin.partners.create', compact('settings'));
    }

    public function store(PartnerRequest $request)
    {
        $this->partnerManager->createPartner($request->validated());

        return redirect()->route('admin.partners.index')->with('success', 'تم إضافة الشريك بنجاح.');
    }

    public function edit(Partner $partner)
    {
        $settings = $this->settingManager->getAllSettings();

        return view('admin.partners.edit', compact('partner', 'settings'));
    }

    public function update(PartnerRequest $request, Partner $partner)
    {
        $settings = $this->settingManager->getAllSettings();
        $this->partnerManager->updatePartner($partner, $request->validated());

        return redirect()->route('admin.partners.index')->with('success', 'تم تحديث الشريك بنجاح.');
    }

    public function destroy(Partner $partner)
    {
        $this->partnerManager->deletePartner($partner);

        return redirect()->route('admin.partners.index')->with('success', 'تم حذف الشريك بنجاح.');
    }
}
