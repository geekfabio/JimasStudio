<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            'whatsapp_number' => '244972465386',
            'whatsapp_message' => 'Olá, gostaria de saber mais sobre os serviços da JIMAS.',
            'site_email' => 'geral@jimas.ao',
            'site_phone' => '+244 972 465 386',
            'site_address' => 'Kilamba, Luanda, Angola',
            'facebook_url' => '',
            'instagram_url' => 'https://www.instagram.com/jimas_lda/',
            'linkedin_url' => '',
            'tiktok_url' => '',
            'home_hero_title' => 'JIMAS Marketing e Comunicação',
            'home_hero_subtitle' => 'Estratégias inteligentes de marketing, comunicação e posicionamento para empresas que querem crescer com autoridade e resultados concretos.',
        ];

        foreach ($settings as $key => $value) {
            SiteSetting::set($key, $value);
        }
    }
}
