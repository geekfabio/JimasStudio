<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(): View
    {
        $news = News::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.news.index', compact('news'));
    }

    public function create(): View
    {
        return view('admin.news.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validateData($request);
        $data['slug'] = $this->makeUniqueSlug($data['title']);
        $data['cover_image'] = $this->uploadImage($request, 'cover_image');

        if ($data['is_published'] ?? false) {
            $data['published_at'] = $data['published_at'] ?? now();
        }

        News::create($data);

        return redirect()->route('admin.news.index')->with('success', 'Notícia criada com sucesso.');
    }

    public function edit(News $news): View
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, News $news): RedirectResponse
    {
        $data = $this->validateData($request);
        $data['cover_image'] = $this->uploadImage($request, 'cover_image', $news->cover_image);

        if (($data['is_published'] ?? false) && empty($news->published_at)) {
            $data['published_at'] = now();
        }

        $news->update($data);

        return redirect()->route('admin.news.index')->with('success', 'Notícia actualizada com sucesso.');
    }

    public function destroy(News $news): RedirectResponse
    {
        if ($news->cover_image) {
            Storage::disk('public')->delete($news->cover_image);
        }
        $news->delete();

        return redirect()->route('admin.news.index')->with('success', 'Notícia eliminada com sucesso.');
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'excerpt' => ['nullable', 'string', 'max:500'],
            'body' => ['required', 'string'],
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

        return $request->file($field)->store('news', 'public');
    }

    private function makeUniqueSlug(string $title): string
    {
        $slug = Str::slug($title);
        $original = $slug;
        $count = 1;

        while (News::where('slug', $slug)->exists()) {
            $slug = "{$original}-" . $count++;
        }

        return $slug;
    }
}
