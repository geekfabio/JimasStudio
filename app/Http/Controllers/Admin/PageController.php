<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    public function index(): View
    {
        $pages = Page::orderBy('sort_order')->orderBy('title')->paginate(15);
        return view('admin.pages.index', compact('pages'));
    }

    public function create(): View
    {
        return view('admin.pages.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validateData($request);

        Page::create($data);

        return redirect()->route('admin.pages.index')->with('success', 'Página criada com sucesso.');
    }

    public function edit(Page $page): View
    {
        return view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request, Page $page): RedirectResponse
    {
        $data = $this->validateData($request);

        $page->update($data);

        return redirect()->route('admin.pages.index')->with('success', 'Página actualizada com sucesso.');
    }

    public function destroy(Page $page): RedirectResponse
    {
        $page->delete();

        return redirect()->route('admin.pages.index')->with('success', 'Página eliminada com sucesso.');
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'slug' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'is_published' => ['boolean'],
            'sort_order' => ['integer'],
        ]);
    }
}
