<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        $events = [
            [
                'title' => 'Workshop: Marketing Digital para Empresas',
                'description' => 'Um workshop prático sobre estratégias de marketing digital, gestão de redes sociais e campanhas publicitárias para empresas angolanas.',
                'location' => 'Kilamba, Luanda',
                'event_date' => now()->addDays(15)->setHour(9)->setMinute(0),
                'is_published' => true,
            ],
            [
                'title' => 'Masterclass de Criação de Conteúdo',
                'description' => 'Aprenda a criar conteúdo profissional para Instagram, TikTok e LinkedIn com a equipa criativa da JIMAS.',
                'location' => 'Online',
                'event_date' => now()->addDays(30)->setHour(14)->setMinute(0),
                'is_published' => true,
            ],
            [
                'title' => 'Networking Empresarial JIMAS',
                'description' => 'Encontro de empresários e empreendedores para partilha de experiências e oportunidades de negócio.',
                'location' => 'Kilamba, Luanda',
                'event_date' => now()->addDays(45)->setHour(18)->setMinute(0),
                'is_published' => true,
            ],
        ];

        foreach ($events as $event) {
            $event['slug'] = Str::slug($event['title']);
            Event::updateOrCreate(['slug' => $event['slug']], $event);
        }
    }
}
