<?php

namespace Database\Seeders;

use App\Models\Addon;
use App\Models\PlanFeature;
use App\Models\ServiceCategory;
use App\Models\ServicePlan;
use App\Models\SubCategory;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedPodcasts();
        $this->seedConteudos();
        $this->seedFotografia();
        $this->seedEventosSociais();
        $this->seedEventosCorporativos();
        $this->seedCasamentos();
    }

    private function createCategory(array $data): ServiceCategory
    {
        return ServiceCategory::updateOrCreate(['slug' => $data['slug']], $data);
    }

    private function createPlan(ServiceCategory $category, ?SubCategory $subCategory, array $planData, array $features): ServicePlan
    {
        $plan = ServicePlan::updateOrCreate(
            [
                'category_id' => $category->id,
                'sub_category_id' => $subCategory?->id,
                'name' => $planData['name'],
            ],
            [
                'price' => $planData['price'],
                'price_label' => $planData['price_label'] ?? null,
                'duration' => $planData['duration'] ?? null,
                'description' => $planData['description'] ?? null,
                'is_featured' => $planData['is_featured'] ?? false,
                'sort_order' => $planData['sort_order'] ?? 0,
            ]
        );

        // Sync features to avoid duplicates on re-runs
        $plan->features()->delete();
        foreach ($features as $index => $feature) {
            $plan->features()->create([
                'text' => $feature,
                'sort_order' => $index,
            ]);
        }

        return $plan;
    }

    private function seedPodcasts(): void
    {
        $category = $this->createCategory([
            'slug' => 'podcasts',
            'label' => 'Estúdio',
            'title' => 'Podcasts',
            'subtitle' => 'Da ideia ao episódio publicado, cobrimos cada etapa da sua produção.',
            'banner_image' => 'https://images.unsplash.com/photo-1638389745870-20140b3d4237?w=1280&h=400&fit=crop&auto=format&q=80',
            'banner_alt' => 'Homem negro a operar câmera de vídeo profissional em tripé',
            'sort_order' => 1,
        ]);

        $this->createPlan($category, null, [
            'name' => 'Start',
            'price' => '15.000',
            'price_label' => 'Kz',
            'duration' => 'por hora',
            'description' => 'Ideal para iniciantes, estudantes e pequenos criadores.',
            'sort_order' => 1,
        ], [
            'Sala de podcast',
            '2 microfones',
            'Iluminação básica',
            '1 câmera fixa',
            'Operador técnico',
            'Áudio bruto',
        ]);

        $this->createPlan($category, null, [
            'name' => 'Plus',
            'price' => '25.000',
            'price_label' => 'Kz',
            'duration' => 'por hora',
            'description' => 'Ideal para podcasts empresariais e entrevistas.',
            'sort_order' => 2,
        ], [
            '2 câmeras',
            '2 microfones profissionais',
            'Iluminação profissional',
            'Operador técnico',
            'Áudio tratado',
            'Cenário padrão',
        ]);

        $this->createPlan($category, null, [
            'name' => 'Business',
            'price' => '90.000',
            'price_label' => 'Kz',
            'duration' => 'por hora',
            'description' => 'Ideal para empresas, influenciadores e marcas.',
            'is_featured' => true,
            'sort_order' => 3,
        ], [
            '2 câmeras',
            'Edição básica',
            'Branding visual',
            '3 cortes para redes sociais',
            'Áudio profissional',
        ]);

        $this->createPlan($category, null, [
            'name' => 'Premium',
            'price' => '180.000',
            'price_label' => 'Kz',
            'duration' => 'por hora',
            'description' => 'Ideal para grandes marcas e programas digitais.',
            'sort_order' => 4,
        ], [
            '3 câmeras',
            'Edição cinematográfica',
            'Motion graphics',
            'Thumbnail personalizado',
            '5 Reels',
            'Branding personalizado',
        ]);
    }

    private function seedConteudos(): void
    {
        $category = $this->createCategory([
            'slug' => 'conteudos',
            'label' => 'Estúdio',
            'title' => 'Gravação de Conteúdos',
            'subtitle' => 'Vídeos prontos para redes sociais, do guião à entrega final.',
            'banner_image' => 'https://plus.unsplash.com/premium_photo-1682130336901-10452a5dd5f4?q=80&w=1332&auto=format&fit=crop',
            'banner_alt' => 'Homem negro com auscultadores e microfone em estúdio de podcast',
            'sort_order' => 2,
        ]);

        $this->createPlan($category, null, [
            'name' => 'Start',
            'price' => '25.000',
            'price_label' => 'Kz',
            'duration' => 'sessão única',
            'sort_order' => 1,
        ], [
            '1 hora de estúdio',
            'Iluminação profissional',
            'Operador técnico',
            'Até 2 vídeos gravados',
        ]);

        $this->createPlan($category, null, [
            'name' => 'Plus',
            'price' => '75.000',
            'price_label' => 'Kz',
            'duration' => 'sessão única',
            'sort_order' => 2,
        ], [
            'Até 2 horas de gravação',
            'Captação profissional',
            'Até 5 vídeos editados',
            'Legendas simples',
        ]);

        $this->createPlan($category, null, [
            'name' => 'Business',
            'price' => '180.000',
            'price_label' => 'Kz',
            'duration' => 'sessão única',
            'is_featured' => true,
            'sort_order' => 3,
        ], [
            'Até 3 horas de gravação',
            '10 vídeos editados',
            'Reels para redes sociais',
            'Branding básico',
        ]);

        $this->createPlan($category, null, [
            'name' => 'Premium',
            'price' => '450.000',
            'price_label' => 'Kz',
            'duration' => 'dia completo',
            'sort_order' => 4,
        ], [
            'Produção full day',
            '20 vídeos editados',
            'Drone',
            'Motion graphics',
            'Conteúdo para redes sociais',
        ]);
    }

    private function seedFotografia(): void
    {
        $category = $this->createCategory([
            'slug' => 'fotografia',
            'label' => 'Estúdio',
            'title' => 'Sessões Fotográficas',
            'subtitle' => 'Do perfil profissional às produções de luxo, imagens que ficam.',
            'banner_image' => 'https://images.unsplash.com/photo-1622750657128-8d1db9f1ba06?w=1280&h=400&fit=crop&auto=format&q=80',
            'banner_alt' => 'Homem negro cineasta a segurar câmera de produção audiovisual',
            'sort_order' => 3,
        ]);

        $this->createPlan($category, null, [
            'name' => 'Start',
            'price' => '55.000',
            'price_label' => 'Kz',
            'duration' => '1 hora',
            'description' => 'Perfil profissional · Redes sociais',
            'sort_order' => 1,
        ], [
            'Sessão em estúdio',
            '1 look',
            '10 fotos editadas',
        ]);

        $this->createPlan($category, null, [
            'name' => 'Plus',
            'price' => '75.000',
            'price_label' => 'Kz',
            'duration' => '2 horas',
            'description' => 'Branding pessoal · Influenciadores',
            'sort_order' => 2,
        ], [
            'Até 2 looks',
            'Direção de poses',
            '10 fotos editadas',
        ]);

        $this->createPlan($category, null, [
            'name' => 'Business',
            'price' => '180.000',
            'price_label' => 'Kz',
            'duration' => '3 horas',
            'description' => 'Executivos · Empresas',
            'sort_order' => 3,
        ], [
            'Sessão corporativa',
            'Até 3 looks',
            '35 fotos editadas',
        ]);

        $this->createPlan($category, null, [
            'name' => 'Premium',
            'price' => '350.000',
            'price_label' => 'Kz',
            'duration' => '4 horas',
            'description' => 'Casais · Influenciadores · Artistas',
            'is_featured' => true,
            'sort_order' => 4,
        ], [
            'Makeup profissional',
            'Produção artística',
            'Vídeo teaser',
            'Até 4 looks',
            '50 fotos editadas',
        ]);

        $this->createPlan($category, null, [
            'name' => 'Luxury',
            'price' => '750.000',
            'price_label' => 'Kz',
            'duration' => 'Full Day',
            'description' => 'Campanhas · Artistas · Marcas',
            'sort_order' => 5,
        ], [
            'Produção cinematográfica',
            'Drone',
            'Making of',
            'Vídeo cinematográfico',
            'Edição Fine Art',
            '80 fotos editadas',
        ]);

        // Maternity sub-category
        $maternity = SubCategory::updateOrCreate(
            ['category_id' => $category->id, 'name' => 'Sessões de Maternidade'],
            ['sort_order' => 1]
        );

        $this->createPlan($category, $maternity, [
            'name' => 'Maternity Start',
            'price' => '190.000',
            'price_label' => 'Kz',
            'duration' => '2 horas',
            'sort_order' => 1,
        ], [
            'Estúdio · Até 2 looks',
            'Direção de poses para gestantes',
            'Participação do companheiro (opcional)',
            '25 fotos editadas',
        ]);

        $this->createPlan($category, $maternity, [
            'name' => 'Maternity Premium',
            'price' => '220.000',
            'price_label' => 'Kz',
            'duration' => '2 horas',
            'is_featured' => true,
            'sort_order' => 2,
        ], [
            'Estúdio ou exterior · 3 looks',
            'Participação do companheiro e filhos',
            'Direção artística',
            'Vídeo teaser para redes sociais',
            '30 fotos editadas',
        ]);

        $this->createPlan($category, $maternity, [
            'name' => 'Maternity Signature',
            'price' => '450.000',
            'price_label' => 'Kz',
            'duration' => 'Até 3 horas',
            'sort_order' => 3,
        ], [
            'Estúdio e exterior · 4 looks',
            'Makeup profissional',
            'Direção criativa especializada',
            'Edição Fine Art',
            '70 fotos editadas',
            'Entrega prioritária',
        ]);

        // Addons
        foreach ([
            ['name' => 'Foto adicional editada', 'price_display' => '3.000 Kz'],
            ['name' => 'Makeup profissional', 'price_display' => '100.000 Kz'],
            ['name' => 'Vídeo teaser', 'price_display' => '50.000 Kz'],
            ['name' => 'Drone', 'price_display' => '80.000 Kz'],
            ['name' => 'Impressão fotográfica', 'price_display' => 'Sob orçamento'],
            ['name' => 'Entrega urgente 24h', 'price_display' => '+25%'],
        ] as $index => $addon) {
            Addon::updateOrCreate(
                ['category_id' => $category->id, 'name' => $addon['name']],
                ['price_display' => $addon['price_display'], 'sort_order' => $index]
            );
        }
    }

    private function seedEventosSociais(): void
    {
        $category = $this->createCategory([
            'slug' => 'eventos',
            'label' => 'Cobertura',
            'title' => 'Eventos Sociais',
            'subtitle' => 'Baptizados, aniversários, noivados e galas — cada instante preservado.',
            'banner_image' => 'https://images.unsplash.com/photo-1699730185428-d11054059c7f?w=1280&h=400&fit=crop&auto=format&q=80',
            'banner_alt' => 'Homem negro fotógrafo com câmera DSLR Nikon profissional',
            'sort_order' => 4,
        ]);

        $this->createPlan($category, null, [
            'name' => 'Start',
            'price' => '150.000',
            'price_label' => 'Kz',
            'duration' => 'Até 3 horas',
            'description' => 'Baptizados · Festas familiares',
            'sort_order' => 1,
        ], [
            '1 fotógrafo',
            '40 fotos editadas',
        ]);

        $this->createPlan($category, null, [
            'name' => 'Plus',
            'price' => '350.000',
            'price_label' => 'Kz',
            'duration' => 'Até 5 horas',
            'description' => 'Aniversários · Noivados',
            'sort_order' => 2,
        ], [
            '1 fotógrafo',
            '100 fotos editadas',
            'Edição premium',
        ]);

        $this->createPlan($category, null, [
            'name' => 'Premium',
            'price' => '750.000',
            'price_label' => 'Kz',
            'duration' => 'Até 5 horas',
            'description' => 'Eventos empresariais',
            'is_featured' => true,
            'sort_order' => 3,
        ], [
            '1 fotógrafo + 1 videomaker',
            '100 fotos editadas',
            'Vídeo highlight',
        ]);

        $this->createPlan($category, null, [
            'name' => 'Signature',
            'price' => '1.250.000',
            'price_label' => 'Kz',
            'duration' => 'Até 8 horas',
            'description' => 'Galas',
            'sort_order' => 4,
        ], [
            'Drone',
            'Foto e vídeo',
            '200 fotos editadas',
            'Filme do evento até 30 min',
        ]);

        $this->createPlan($category, null, [
            'name' => 'Luxury',
            'price' => '1.500.000',
            'price_label' => 'Kz',
            'duration' => 'Até 8 horas',
            'description' => 'Grandes e eventos institucionais',
            'sort_order' => 5,
        ], [
            'Equipa completa',
            'Drone',
            '200 fotos editadas',
            'Filme cinematográfico até 1h',
        ]);
    }

    private function seedEventosCorporativos(): void
    {
        $category = $this->createCategory([
            'slug' => 'corporativos',
            'label' => 'Cobertura',
            'title' => 'Eventos Corporativos',
            'subtitle' => 'Workshops, conferências, summits e feiras com cobertura à altura da sua marca.',
            'banner_image' => 'https://images.unsplash.com/photo-1573164574511-73c773193279?w=1280&h=400&fit=crop&auto=format&q=80',
            'banner_alt' => 'Grupo de pessoas negras a celebrar com confetes e balões',
            'sort_order' => 5,
        ]);

        $this->createPlan($category, null, [
            'name' => 'Corporate Start',
            'price' => '350.000',
            'price_label' => 'Kz',
            'duration' => 'Até 4 horas',
            'description' => 'Workshops · Reuniões',
            'sort_order' => 1,
        ], [
            '1 fotógrafo',
            '100 fotografias editadas',
        ]);

        $this->createPlan($category, null, [
            'name' => 'Corporate Business',
            'price' => '850.000',
            'price_label' => 'Kz',
            'duration' => 'Até 8 horas',
            'description' => 'Conferências · Fóruns',
            'is_featured' => true,
            'sort_order' => 2,
        ], [
            'Foto e vídeo',
            '200 fotos editadas',
            'Vídeo institucional',
        ]);

        $this->createPlan($category, null, [
            'name' => 'Corporate Premium',
            'price' => '2.000.000',
            'price_label' => 'Kz',
            'duration' => 'Até 8 horas',
            'description' => 'Summits · Congressos · Feiras',
            'sort_order' => 3,
        ], [
            'Drone',
            'Multicâmera',
            '400 fotos editadas',
            'Vídeo institucional',
            'Reels para redes sociais',
        ]);
    }

    private function seedCasamentos(): void
    {
        $category = $this->createCategory([
            'slug' => 'casamentos',
            'label' => 'O Grande Dia',
            'title' => 'Casamentos',
            'subtitle' => 'Do essencial ao cinematográfico — o vosso dia para sempre.',
            'banner_image' => 'https://images.unsplash.com/photo-1624228652954-9e3725a2a4f8?w=1280&h=400&fit=crop&auto=format&q=80',
            'banner_alt' => 'Reunião de negócios com profissionais negros em sala de conferência',
            'sort_order' => 6,
        ]);

        $this->createPlan($category, null, [
            'name' => 'Essencial',
            'price' => '850.000',
            'price_label' => 'Kz',
            'duration' => 'Até 6 horas',
            'sort_order' => 1,
        ], [
            'Foto e vídeo',
            '150 fotos editadas',
            'Vídeo highlight',
        ]);

        $this->createPlan($category, null, [
            'name' => 'Premium',
            'price' => '1.800.000',
            'price_label' => 'Kz',
            'duration' => 'Até 10 horas',
            'is_featured' => true,
            'sort_order' => 2,
        ], [
            'Drone',
            'Making of (bastidores + preparação)',
            '200 fotos editadas',
            'Filme do casamento',
        ]);

        $this->createPlan($category, null, [
            'name' => 'Signature',
            'price' => '2.000.000',
            'price_label' => 'Kz',
            'duration' => 'Até 10 horas',
            'sort_order' => 3,
        ], [
            'Equipa completa',
            'Drone',
            'Reels',
            'Álbum digital',
            '500 fotos editadas',
            'Filme cinematográfico',
        ]);

        // Proposal / Engagement
        $love = SubCategory::updateOrCreate(
            ['category_id' => $category->id, 'name' => 'Pedidos de Casamento & Noivados'],
            ['sort_order' => 1]
        );

        $this->createPlan($category, $love, [
            'name' => 'Love Start',
            'price' => '280.000',
            'price_label' => 'Kz',
            'duration' => 'Até 2 horas',
            'sort_order' => 1,
        ], [
            '40 fotos editadas',
        ]);

        $this->createPlan($category, $love, [
            'name' => 'Love Premium',
            'price' => '350.000',
            'price_label' => 'Kz',
            'duration' => 'Até 3 horas',
            'is_featured' => true,
            'sort_order' => 2,
        ], [
            'Foto e vídeo',
            '80 fotos editadas',
            'Vídeo teaser',
        ]);

        $this->createPlan($category, $love, [
            'name' => 'Love Signature',
            'price' => '650.000',
            'price_label' => 'Kz',
            'duration' => 'Até 5 horas',
            'sort_order' => 3,
        ], [
            'Drone',
            'Foto e vídeo',
            '150 fotos editadas',
            'Vídeo teaser',
        ]);

        // Birthdays
        $birthdays = SubCategory::updateOrCreate(
            ['category_id' => $category->id, 'name' => 'Aniversários'],
            ['sort_order' => 2]
        );

        $this->createPlan($category, $birthdays, [
            'name' => 'Start',
            'price' => '180.000',
            'price_label' => 'Kz',
            'duration' => 'Até 3 horas',
            'sort_order' => 1,
        ], [
            '50 fotos editadas',
        ]);

        $this->createPlan($category, $birthdays, [
            'name' => 'Plus',
            'price' => '400.000',
            'price_label' => 'Kz',
            'duration' => 'Até 5 horas',
            'is_featured' => true,
            'sort_order' => 2,
        ], [
            'Foto e vídeo',
            '120 fotos editadas',
            'Vídeo highlight',
        ]);

        $this->createPlan($category, $birthdays, [
            'name' => 'Premium',
            'price' => '900.000',
            'price_label' => 'Kz',
            'duration' => 'Até 8 horas',
            'sort_order' => 3,
        ], [
            'Foto e vídeo',
            '250 fotos editadas',
            'Reels para redes sociais',
        ]);

        // Addons
        foreach ([
            ['name' => 'Hora extra de cobertura', 'price_display' => '40.000 Kz'],
            ['name' => 'Drone', 'price_display' => '80.000 Kz'],
            ['name' => 'Livestream', 'price_display' => '250.000 Kz'],
            ['name' => 'Reel adicional', 'price_display' => '20.000 Kz'],
            ['name' => 'Vídeo teaser', 'price_display' => '50.000 Kz'],
            ['name' => 'Entrega urgente 24h', 'price_display' => '+25%'],
        ] as $index => $addon) {
            Addon::updateOrCreate(
                ['category_id' => $category->id, 'name' => $addon['name']],
                ['price_display' => $addon['price_display'], 'sort_order' => $index]
            );
        }
    }
}
