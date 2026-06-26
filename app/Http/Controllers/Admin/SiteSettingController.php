<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SiteSettingController extends Controller
{
    private array $settingKeys = [
        'whatsapp_number',
        'whatsapp_message',
        'site_email',
        'site_address',
        'site_phone',
        'facebook_url',
        'instagram_url',
        'linkedin_url',
        'tiktok_url',
        'home_hero_title',
        'home_hero_subtitle',
    ];

    public function edit(): View
    {
        $settings = [];
        foreach ($this->settingKeys as $key) {
            $settings[$key] = SiteSetting::get($key, '');
        }

        return view('admin.settings.edit', compact('settings'));
    }

    public function update(Request $request): RedirectResponse
    {
        foreach ($this->settingKeys as $key) {
            SiteSetting::set($key, $request->input($key, ''));
        }

        return redirect()->route('admin.settings.edit')->with('success', 'Configurações actualizadas com sucesso.');
    }
}
