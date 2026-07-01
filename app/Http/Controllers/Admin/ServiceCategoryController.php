<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ServiceCategoryController extends Controller
{
    public function index(): View
    {
        $categories = ServiceCategory::withCount(['plans', 'subCategories'])
            ->orderBy('sort_order')
            ->paginate(15);

        return view('admin.services.categories.index', compact('categories'));
    }

    public function create(): View
    {
        return view('admin.services.categories.create', [
            'iconOptions' => service_icon_options(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validateData($request);
        $data['banner_image'] = $this->uploadImage($request, 'banner_image');

        ServiceCategory::create($data);

        return redirect()->route('admin.services.index')->with('success', 'Categoria criada com sucesso.');
    }

    public function edit(ServiceCategory $service): View
    {
        return view('admin.services.categories.edit', [
            'service' => $service,
            'iconOptions' => service_icon_options(),
        ]);
    }

    public function update(Request $request, ServiceCategory $service): RedirectResponse
    {
        $data = $this->validateData($request);
        $data['banner_image'] = $this->uploadImage($request, 'banner_image', $service->banner_image);

        $service->update($data);

        return redirect()->route('admin.services.index')->with('success', 'Categoria actualizada com sucesso.');
    }

    public function destroy(ServiceCategory $service): RedirectResponse
    {
        if ($service->banner_image) {
            Storage::disk('public')->delete($service->banner_image);
        }
        $service->delete();

        return redirect()->route('admin.services.index')->with('success', 'Categoria eliminada com sucesso.');
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'slug' => ['required', 'string', 'max:255'],
            'label' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string'],
            'icon' => ['nullable', 'string', 'max:255'],
            'banner_image' => ['nullable', 'image', 'max:2048'],
            'banner_alt' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['integer'],
            'is_active' => ['boolean'],
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

        return $request->file($field)->store('services', 'public');
    }
}
