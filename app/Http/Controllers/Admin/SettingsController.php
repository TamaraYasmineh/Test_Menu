<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAdminSettingRequest;
use App\Models\AdminSetting;

class SettingsController extends Controller
{
    public function edit()
    {
        return view('admin.settings.edit', [
            'settings' => AdminSetting::current(),
        ]);
    }

    public function update(UpdateAdminSettingRequest $request)
    {
        AdminSetting::current()->update($request->validated());

        return redirect()
            ->route('admin.settings.edit')
            ->with('success', 'تم تحديث ألوان لوحة الإدارة بنجاح.');
    }
}
