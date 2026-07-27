<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class SiteSettingController extends Controller
{
    private array $textKeys = [
        'whatsapp_number', 'whatsapp_message', 'site_email', 'site_address', 'site_phone',
        'facebook_url', 'instagram_url', 'linkedin_url', 'tiktok_url',
        'seo_title', 'seo_description', 'seo_keywords',
        'home_hero_label', 'home_hero_title', 'home_hero_subtitle', 'home_hero_primary_text', 'home_hero_secondary_text',
        'home_about_label', 'home_about_title', 'home_about_text', 'home_about_button',
        'home_services_label', 'home_services_title', 'home_services_text',
        'home_portfolio_label', 'home_portfolio_title',
        'home_news_label', 'home_news_title',
        'home_cta_label', 'home_cta_title', 'home_cta_text', 'home_cta_button',
    ];

    private array $imageKeys = ['site_logo', 'seo_image', 'home_hero_image', 'home_about_image', 'home_news_fallback_image'];

    public function edit(): View
    {
        $settings = [];
        foreach ([...$this->textKeys, ...$this->imageKeys] as $key) {
            $settings[$key] = SiteSetting::get($key, '');
        }

        return view('admin.settings.edit', compact('settings'));
    }

    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'site_email' => ['nullable', 'email'],
            'facebook_url' => ['nullable', 'url'], 'instagram_url' => ['nullable', 'url'],
            'linkedin_url' => ['nullable', 'url'], 'tiktok_url' => ['nullable', 'url'],
            'seo_description' => ['nullable', 'string', 'max:320'],
            'seo_title' => ['nullable', 'string', 'max:70'],
            'site_logo' => ['nullable', 'image', 'max:4096'], 'seo_image' => ['nullable', 'image', 'max:4096'],
            'home_hero_image' => ['nullable', 'image', 'max:8192'], 'home_about_image' => ['nullable', 'image', 'max:4096'],
            'home_news_fallback_image' => ['nullable', 'image', 'max:4096'],
        ]);

        foreach ($this->textKeys as $key) {
            SiteSetting::set($key, $request->input($key, ''));
        }

        foreach ($this->imageKeys as $key) {
            if (! $request->hasFile($key)) {
                continue;
            }
            $old = SiteSetting::get($key);
            if ($old) {
                Storage::disk('public')->delete($old);
            }
            SiteSetting::set($key, $request->file($key)->store('site', 'public'));
        }

        return redirect()->route('admin.settings.edit')->with('success', 'Configurações actualizadas com sucesso.');
    }
}
