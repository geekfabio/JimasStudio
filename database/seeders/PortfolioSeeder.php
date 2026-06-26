<?php

namespace Database\Seeders;

use App\Models\PortfolioItem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'title' => 'Campanha de Lançamento',
                'client' => 'Marca angolana',
                'description' => 'Estratégia de lançamento completa: identidade visual, conteúdo para redes sociais e campanha publicitária.',
                'category' => 'Marketing',
                'is_published' => true,
            ],
            [
                'title' => 'Gestão de Redes Sociais',
                'client' => 'Empresa de serviços',
                'description' => 'Criação de calendário editorial, design de posts e gestão diária de Instagram e Facebook.',
                'category' => 'Social Media',
                'is_published' => true,
            ],
            [
                'title' => 'Produção de Podcast',
                'client' => 'Criador de conteúdo',
                'description' => 'Gravação e edição de episódios de podcast na sala profissional da JIMAS.',
                'category' => 'Produção',
                'is_published' => true,
            ],
        ];

        foreach ($items as $item) {
            $item['slug'] = Str::slug($item['title']);
            PortfolioItem::create($item);
        }
    }
}
