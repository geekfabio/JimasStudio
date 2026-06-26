<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Page;
use App\Models\PortfolioItem;
use App\Models\ServiceCategory;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        return view('home', [
            'aboutPage' => Page::published()->bySlug('sobre-nos')->first(),
            'services' => ServiceCategory::where('is_active', true)->orderBy('sort_order')->limit(6)->get(),
            'portfolio' => PortfolioItem::published()->limit(6)->get(),
            'news' => News::published()->limit(3)->get(),
            'metaTitle' => setting('home_hero_title', 'JIMAS Marketing e Comunicação — Estratégias de Crescimento em Angola'),
            'metaDescription' => setting('home_hero_subtitle', 'Mais do que marketing, entregamos crescimento. Estratégias de marketing, comunicação e posicionamento para empresas em Luanda, Angola.'),
            'canonical' => config('app.url'),
        ]);
    }
}
