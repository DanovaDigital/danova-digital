<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    public function index(Request $request)
    {
        $group = $request->query('group');

        $query = SiteSetting::query()->orderBy('group')->orderBy('key');
        if (is_string($group) && $group !== '') {
            $query->where('group', $group);
        }

        $settings = $query->get();

        return view('admin.settings.index', [
            'settings' => $settings,
            'group' => $group,
        ]);
    }

    public function create()
    {
        return view('admin.settings.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'key' => ['required', 'string', 'max:255', 'unique:site_settings,key'],
            'value' => ['nullable', 'string'],
            'type' => ['required', 'string', 'max:50'],
            'group' => ['nullable', 'string', 'max:50'],
        ]);

        SiteSetting::create($data);

        return redirect()->route('admin.settings.index');
    }

    public function edit(SiteSetting $setting)
    {
        return view('admin.settings.edit', ['setting' => $setting]);
    }

    public function update(Request $request, SiteSetting $setting)
    {
        $data = $request->validate([
            'key' => ['required', 'string', 'max:255', 'unique:site_settings,key,' . $setting->id],
            'value' => ['nullable', 'string'],
            'type' => ['required', 'string', 'max:50'],
            'group' => ['nullable', 'string', 'max:50'],
        ]);

        $setting->update($data);

        return redirect()->route('admin.settings.index');
    }

    public function destroy(SiteSetting $setting)
    {
        $setting->delete();

        return redirect()->route('admin.settings.index');
    }

    public function bulkUpdate(Request $request)
    {
        $settings = $request->input('settings', []);

        // Handle text settings
        foreach ($settings as $key => $value) {
            SiteSetting::updateOrCreate(
                ['key' => $key],
                [
                    'value' => $value,
                    'type' => 'text',
                    'group' => explode('.', $key)[0] ?? 'general',
                ]
            );
        }

        // Handle file uploads
        $imageFields = [
            'hero_showcase_logo' => 'hero.showcase_logo',
            'hero_badge_avatar1' => 'hero.badge_avatar1',
            'hero_badge_avatar2' => 'hero.badge_avatar2',
            'hero_badge_avatar3' => 'hero.badge_avatar3',
            'branding_header_logo' => 'branding.header_logo',
        ];

        foreach ($imageFields as $fieldName => $settingKey) {
            if ($request->hasFile($fieldName)) {
                $file = $request->file($fieldName);

                // Delete old file if exists
                $oldSetting = SiteSetting::where('key', $settingKey)->first();
                if ($oldSetting && $oldSetting->value) {
                    $oldPath = storage_path('app/public/' . $oldSetting->value);
                    if (file_exists($oldPath)) {
                        unlink($oldPath);
                    }
                }

                // Store new file
                $path = $file->store('images/settings', 'public');

                SiteSetting::updateOrCreate(
                    ['key' => $settingKey],
                    [
                        'value' => $path,
                        'type' => 'file',
                        'group' => explode('.', $settingKey)[0] ?? 'general',
                    ]
                );
            }
        }

        return redirect()->route('admin.settings.index')->with('success', 'Settings berhasil disimpan!');
    }
}
