<?php

namespace App\Http\Controllers;

use App\Models\ServiceCategory;
use Illuminate\View\View;

class EventosController extends Controller
{
    public function __invoke(): View
    {
        $categories = ServiceCategory::with([
                'plans.features',
                'subCategories.plans.features',
                'addons',
            ])
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('eventos', [
            'categories' => $categories,
            'metaTitle' => 'JIMAS Studio & Media — Tabela de Preços e Produção Audiovisual 2026',
            'metaDescription' => 'Tabela de preços 2026 do JIMAS Studio & Media em Luanda, Angola. Serviços profissionais de produção de podcasts, gravação de conteúdos, sessões fotográficas, cobertura de eventos sociais e casamentos.',
            'canonical' => config('app.url'),
        ]);
    }
}
