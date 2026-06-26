<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PortfolioItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PortfolioController extends Controller
{
    public function index(): View
    {
        $items = PortfolioItem::orderBy('sort_order')->orderBy('created_at', 'desc')->paginate(15);
        return view('admin.portfolio.index', compact('items'));
    }

    public function create(): View
    {
        return view('admin.portfolio.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validateData($request);
        $data['slug'] = $this->makeUniqueSlug($data['title']);
        $data['cover_image'] = $this->uploadImage($request, 'cover_image');
        $data['gallery_images'] = $this->uploadGallery($request);

        PortfolioItem::create($data);

        return redirect()->route('admin.portfolio.index')->with('success', 'Item de portfólio criado com sucesso.');
    }

    public function edit(PortfolioItem $portfolio): View
    {
        return view('admin.portfolio.edit', compact('portfolio'));
    }

    public function update(Request $request, PortfolioItem $portfolio): RedirectResponse
    {
        $data = $this->validateData($request);
        $data['cover_image'] = $this->uploadImage($request, 'cover_image', $portfolio->cover_image);

        $existingGallery = $portfolio->gallery_images ?? [];
        $newGallery = $this->uploadGallery($request);
        $data['gallery_images'] = array_filter(array_merge($existingGallery, $newGallery));

        $portfolio->update($data);

        return redirect()->route('admin.portfolio.index')->with('success', 'Item de portfólio actualizado com sucesso.');
    }

    public function destroy(PortfolioItem $portfolio): RedirectResponse
    {
        if ($portfolio->cover_image) {
            Storage::disk('public')->delete($portfolio->cover_image);
        }
        foreach ($portfolio->gallery_images ?? [] as $image) {
            Storage::disk('public')->delete($image);
        }
        $portfolio->delete();

        return redirect()->route('admin.portfolio.index')->with('success', 'Item de portfólio eliminado com sucesso.');
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'client' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'category' => ['nullable', 'string', 'max:255'],
            'cover_image' => ['nullable', 'image', 'max:2048'],
            'gallery_images.*' => ['nullable', 'image', 'max:2048'],
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

        return $request->file($field)->store('portfolio', 'public');
    }

    private function uploadGallery(Request $request): array
    {
        $images = [];
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $file) {
                $images[] = $file->store('portfolio', 'public');
            }
        }
        return $images;
    }

    private function makeUniqueSlug(string $title): string
    {
        $slug = Str::slug($title);
        $original = $slug;
        $count = 1;

        while (PortfolioItem::where('slug', $slug)->exists()) {
            $slug = "{$original}-" . $count++;
        }

        return $slug;
    }
}
