<?php

namespace App\Http\Controllers;

use App\Models\ServiceCategory;
use Illuminate\View\View;

class PricingController extends Controller
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

        return view('pricing', [
            'categories' => $categories,
            'metaTitle' => 'Serviços — JIMAS Marketing e Comunicação',
            'metaDescription' => 'Descubra os serviços, estúdios e salas profissionais da JIMAS em Luanda, Angola.',
            'canonical' => route('servicos'),
        ]);
    }
}
