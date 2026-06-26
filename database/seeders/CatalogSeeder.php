<?php

namespace Database\Seeders;

use App\Models\CatalogItem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CatalogSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'title' => 'Sala de Podcast',
                'description' => "Espaço profissional equipado com tecnologia de áudio e vídeo de alta qualidade para gravação de podcasts, entrevistas e conteúdo audiovisual.\n\nInclui:\n- Equipamento de áudio profissional\n- Câmeras e iluminação dedicada\n- Isolamento acústico\n- Setup pronto para gravar",
                'price_display' => 'A partir de 15.000 Kz/hora',
                'is_published' => true,
            ],
            [
                'title' => 'Sala de Reunião',
                'description' => "Ambiente corporativo profissional para reuniões, apresentações e encontros empresariais, com toda a estrutura necessária para um encontro de alto nível.\n\nInclui:\n- Ambiente climatizado e confortável\n- Ecrã e projecção disponíveis\n- Conexão Wi-Fi de alta velocidade\n- Capacidade para grupos",
                'price_display' => 'Sob orçamento',
                'is_published' => true,
            ],
            [
                'title' => 'Estúdio Fotografia & Conteúdo',
                'description' => "Estúdio completo para sessões fotográficas, gravação de vídeos e criação de conteúdo digital profissional para marcas e criadores de conteúdo.\n\nInclui:\n- Fundos e cenários profissionais\n- Iluminação de estúdio completa\n- Espaço para criação de conteúdo\n- Ideal para marcas e criadores",
                'price_display' => 'A partir de 55.000 Kz',
                'is_published' => true,
            ],
        ];

        foreach ($items as $item) {
            $item['slug'] = Str::slug($item['title']);
            CatalogItem::create($item);
        }
    }
}
