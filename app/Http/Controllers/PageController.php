<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PageController extends Controller
{
    public function show(string $slug): View
    {
        $page = Page::published()->bySlug($slug)->firstOrFail();

        return view('pages.show', [
            'page' => $page,
            'metaTitle' => $page->title . ' — JIMAS Marketing e Comunicação',
            'metaDescription' => strip_tags(Str::limit($page->content, 160)),
            'canonical' => route('pages.show', $page->slug),
        ]);
    }
}
