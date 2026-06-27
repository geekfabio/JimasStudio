<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        $news = [
            [
                'title' => 'Como construir autoridade digital em Angola',
                'excerpt' => 'Descubra as estratégias essenciais para posicionar a sua marca online e conquistar a confiança do público.',
                'body' => '<p>A autoridade digital é um dos pilares do crescimento empresarial moderno. Em Angola, onde o mercado digital está em expansão acelerada, as empresas que investem em presença online de qualidade conseguem destacar-se da concorrência.</p><p>Na JIMAS, ajudamos marcas a construírem reputação através de conteúdo estratégico, gestão de redes sociais e campanhas publicitárias orientadas para resultados.</p>',
                'published_at' => now()->subDays(5),
                'is_published' => true,
            ],
            [
                'title' => 'O papel do tráfego pago no crescimento de vendas',
                'excerpt' => 'O tráfego pago permite atingir o público certo, no momento certo, com mensagens personalizadas.',
                'body' => '<p>Facebook Ads, Instagram Ads, Google Ads e TikTok Ads são ferramentas poderosas para gerar leads e aumentar vendas. O segredo está em combinar criatividade com análise de dados.</p><p>A JIMAS desenvolve campanhas publicitárias estratégicas que maximizam o retorno do investimento dos seus clientes.</p>',
                'published_at' => now()->subDays(12),
                'is_published' => true,
            ],
            [
                'title' => 'Nova sala de podcast disponível no Kilamba',
                'excerpt' => 'Espaço profissional equipado com tecnologia de áudio e vídeo de alta qualidade para criadores de conteúdo.',
                'body' => '<p>A JIMAS disponibiliza uma sala de podcast profissional em Kilamba, Luanda. O espaço conta com equipamento de áudio profissional, câmeras, iluminação dedicada e isolamento acústico.</p><p>Ideal para gravação de podcasts, entrevistas e conteúdo audiovisual de alta qualidade.</p>',
                'published_at' => now()->subDays(20),
                'is_published' => true,
            ],
        ];

        foreach ($news as $item) {
            $item['slug'] = Str::slug($item['title']);
            News::updateOrCreate(['slug' => $item['slug']], $item);
        }
    }
}
