@extends('layouts.admin')

@section('title', 'Configurações')

@section('content')
    <div class="flex items-center justify-between mb-8">
        <h1 class="font-display font-bold text-3xl text-ink-50">Configurações do site</h1>
    </div>

    <form method="POST" action="{{ route('admin.settings.update') }}" class="bg-white border border-ink-200 rounded-xl p-6 space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-ink-500 mb-1">Número WhatsApp</label>
                <input type="text" name="whatsapp_number" value="{{ old('whatsapp_number', $settings['whatsapp_number']) }}"
                    class="w-full px-4 py-2 rounded-lg bg-white border border-ink-200 text-ink-50 focus:border-gold-300 outline-none" />
                <p class="text-xs text-ink-500 mt-1">Ex: 244972465386</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-ink-500 mb-1">Mensagem WhatsApp</label>
                <input type="text" name="whatsapp_message" value="{{ old('whatsapp_message', $settings['whatsapp_message']) }}"
                    class="w-full px-4 py-2 rounded-lg bg-white border border-ink-200 text-ink-50 focus:border-gold-300 outline-none" />
            </div>

            <div>
                <label class="block text-sm font-medium text-ink-500 mb-1">Email</label>
                <input type="email" name="site_email" value="{{ old('site_email', $settings['site_email']) }}"
                    class="w-full px-4 py-2 rounded-lg bg-white border border-ink-200 text-ink-50 focus:border-gold-300 outline-none" />
            </div>

            <div>
                <label class="block text-sm font-medium text-ink-500 mb-1">Telefone</label>
                <input type="text" name="site_phone" value="{{ old('site_phone', $settings['site_phone']) }}"
                    class="w-full px-4 py-2 rounded-lg bg-white border border-ink-200 text-ink-50 focus:border-gold-300 outline-none" />
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-ink-500 mb-1">Endereço</label>
                <input type="text" name="site_address" value="{{ old('site_address', $settings['site_address']) }}"
                    class="w-full px-4 py-2 rounded-lg bg-white border border-ink-200 text-ink-50 focus:border-gold-300 outline-none" />
            </div>

            <div>
                <label class="block text-sm font-medium text-ink-500 mb-1">Facebook</label>
                <input type="url" name="facebook_url" value="{{ old('facebook_url', $settings['facebook_url']) }}"
                    class="w-full px-4 py-2 rounded-lg bg-white border border-ink-200 text-ink-50 focus:border-gold-300 outline-none" />
            </div>

            <div>
                <label class="block text-sm font-medium text-ink-500 mb-1">Instagram</label>
                <input type="url" name="instagram_url" value="{{ old('instagram_url', $settings['instagram_url']) }}"
                    class="w-full px-4 py-2 rounded-lg bg-white border border-ink-200 text-ink-50 focus:border-gold-300 outline-none" />
            </div>

            <div>
                <label class="block text-sm font-medium text-ink-500 mb-1">LinkedIn</label>
                <input type="url" name="linkedin_url" value="{{ old('linkedin_url', $settings['linkedin_url']) }}"
                    class="w-full px-4 py-2 rounded-lg bg-white border border-ink-200 text-ink-50 focus:border-gold-300 outline-none" />
            </div>

            <div>
                <label class="block text-sm font-medium text-ink-500 mb-1">TikTok</label>
                <input type="url" name="tiktok_url" value="{{ old('tiktok_url', $settings['tiktok_url']) }}"
                    class="w-full px-4 py-2 rounded-lg bg-white border border-ink-200 text-ink-50 focus:border-gold-300 outline-none" />
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-ink-500 mb-1">Título Hero (Home)</label>
                <input type="text" name="home_hero_title" value="{{ old('home_hero_title', $settings['home_hero_title']) }}"
                    class="w-full px-4 py-2 rounded-lg bg-white border border-ink-200 text-ink-50 focus:border-gold-300 outline-none" />
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-ink-500 mb-1">Subtítulo Hero (Home)</label>
                <textarea name="home_hero_subtitle" rows="3"
                    class="w-full px-4 py-2 rounded-lg bg-white border border-ink-200 text-ink-50 focus:border-gold-300 outline-none">{{ old('home_hero_subtitle', $settings['home_hero_subtitle']) }}</textarea>
            </div>
        </div>

        <div class="pt-4 border-t border-ink-200">
            <button type="submit" class="px-6 py-3 rounded-lg bg-gold-300 hover:bg-gold-200 text-ink-50 font-semibold transition-colors">
                Guardar configurações
            </button>
        </div>
    </form>
@endsection
