<?php

namespace App\Http\Controllers;

use App\Models\PortfolioItem;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PortfolioController extends Controller
{
    public function index(): View
    {
        $items = PortfolioItem::published()->paginate(12);

        return view('portfolio.index', [
            'items' => $items,
            'metaTitle' => 'Portfólio — JIMAS Marketing e Comunicação',
            'metaDescription' => 'Conheça os projectos e trabalhos realizados pela JIMAS em Luanda, Angola.',
            'canonical' => route('portfolio.index'),
        ]);
    }

    public function show(PortfolioItem $portfolio): View
    {
        abort_if(! $portfolio->is_published, 404);

        return view('portfolio.show', [
            'item' => $portfolio,
            'metaTitle' => $portfolio->title . ' — Portfólio JIMAS',
            'metaDescription' => strip_tags(Str::limit($portfolio->description, 160)),
            'canonical' => route('portfolio.show', $portfolio->slug),
        ]);
    }
}
