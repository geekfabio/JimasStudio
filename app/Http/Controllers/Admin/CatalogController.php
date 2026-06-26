<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CatalogItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CatalogController extends Controller
{
    public function index(): View
    {
        $items = CatalogItem::orderBy('sort_order')->orderBy('created_at', 'desc')->paginate(15);
        return view('admin.catalog.index', compact('items'));
    }

    public function create(): View
    {
        return view('admin.catalog.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validateData($request);
        $data['slug'] = $this->makeUniqueSlug($data['title']);
        $data['cover_image'] = $this->uploadImage($request, 'cover_image');

        CatalogItem::create($data);

        return redirect()->route('admin.catalog.index')->with('success', 'Item do catálogo criado com sucesso.');
    }

    public function edit(CatalogItem $catalog): View
    {
        return view('admin.catalog.edit', compact('catalog'));
    }

    public function update(Request $request, CatalogItem $catalog): RedirectResponse
    {
        $data = $this->validateData($request);
        $data['cover_image'] = $this->uploadImage($request, 'cover_image', $catalog->cover_image);

        $catalog->update($data);

        return redirect()->route('admin.catalog.index')->with('success', 'Item do catálogo actualizado com sucesso.');
    }

    public function destroy(CatalogItem $catalog): RedirectResponse
    {
        if ($catalog->cover_image) {
            Storage::disk('public')->delete($catalog->cover_image);
        }
        $catalog->delete();

        return redirect()->route('admin.catalog.index')->with('success', 'Item do catálogo eliminado com sucesso.');
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'price_display' => ['nullable', 'string', 'max:255'],
            'cover_image' => ['nullable', 'image', 'max:2048'],
            'is_published' => ['boolean'],
            'sort_order' => ['integer'],
        ]);
    }

    private function uploadImage(Request $request, string $field, ?string $existing = null): ?string
    {
        if (! $request->hasFile($field)) {
            return $existing;
        }

        if ($existing) {
            Storage::disk('public')->delete($existing);
        }

        return $request->file($field)->store('catalog', 'public');
    }

    private function makeUniqueSlug(string $title): string
    {
        $slug = Str::slug($title);
        $original = $slug;
        $count = 1;

        while (CatalogItem::where('slug', $slug)->exists()) {
            $slug = "{$original}-" . $count++;
        }

        return $slug;
    }
}
