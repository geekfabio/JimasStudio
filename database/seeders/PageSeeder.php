<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        Page::updateOrCreate(
            ['slug' => 'sobre-nos'],
            [
                'title' => 'Sobre Nós',
                'content' => <<<'HTML'
<p><strong>Quem somos: mais do que marketing, entregamos crescimento.</strong></p>
<p>A <strong>JIMAS Marketing e Comunicação</strong> é uma empresa especializada em estratégias de crescimento empresarial, posicionamento de marcas e comunicação corporativa. Actuamos no desenvolvimento de soluções modernas e inteligentes que ajudam empresas a fortalecerem a sua imagem, aumentarem a sua presença no mercado e gerarem resultados concretos através do marketing estratégico e apoio à área comercial.</p>
<p>Mais do que gerir redes sociais, a JIMAS trabalha para transformar empresas em marcas fortes, profissionais, competitivas e reconhecidas no mercado.</p>

<h3>Visão</h3>
<p>Ser uma das maiores referências em Marketing e Comunicação em Angola, reconhecida pela capacidade de transformar empresas através de estratégias modernas, criativas e orientadas para resultados.</p>

<h3>Missão</h3>
<p>Transformar empresas através da comunicação estratégica e do marketing inteligente, fortalecendo marcas, aumentando resultados e criando posicionamentos de alto valor no mercado.</p>

<h3>Valores</h3>
<ul>
    <li>Criatividade</li>
    <li>Profissionalismo</li>
    <li>Compromisso</li>
    <li>Inovação</li>
    <li>Excelência</li>
    <li>Estratégia</li>
    <li>Resultados</li>
    <li>Transparência</li>
    <li>Crescimento Contínuo</li>
</ul>

<h3>Por que a JIMAS?</h3>
<ul>
    <li><strong>Estratégias personalizadas:</strong> cada cliente é único. Desenvolvemos estratégias à medida das necessidades e objectivos do teu negócio.</li>
    <li><strong>Foco em resultados reais:</strong> não criamos apenas conteúdo. Criamos marcas fortes e negócios preparados para crescer de forma sustentável.</li>
    <li><strong>Crescimento orientado por dados:</strong> tomamos decisões estratégicas baseadas em análises e métricas, garantindo evolução constante.</li>
    <li><strong>Equipa criativa e estratégica:</strong> combinamos criatividade com pensamento estratégico para entregar comunicação moderna e profissional.</li>
</ul>
HTML,
                'is_published' => true,
                'sort_order' => 1,
            ]
        );

        Page::updateOrCreate(
            ['slug' => 'empresa'],
            [
                'title' => 'A Empresa',
                'content' => '<p>A JIMAS Marketing e Comunicação posiciona empresas angolanas no mercado através de estratégias de marketing, comunicação corporativa e gestão de marca.</p>',
                'is_published' => true,
                'sort_order' => 2,
            ]
        );
    }
}
