<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Support\Str;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(): View
    {
        $news = News::published()->paginate(9);

        return view('news.index', [
            'news' => $news,
            'metaTitle' => 'Notícias — JIMAS Marketing e Comunicação',
            'metaDescription' => 'Últimas notícias, insights e actualizações da JIMAS em Luanda, Angola.',
            'canonical' => route('news.index'),
        ]);
    }

    public function show(News $news): View
    {
        abort_if(! $news->is_published, 404);

        return view('news.show', [
            'item' => $news,
            'metaTitle' => $news->title . ' — Notícias JIMAS',
            'metaDescription' => strip_tags($news->excerpt ?? Str::limit($news->body, 160)),
            'canonical' => route('news.show', $news->slug),
        ]);
    }
}
