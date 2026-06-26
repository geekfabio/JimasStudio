<form method="POST" action="{{ $route }}" enctype="multipart/form-data" class="bg-white border border-ink-200 rounded-xl p-6 space-y-6">
    @csrf
    @method($method)

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label class="block text-sm font-medium text-ink-500 mb-1">Slug</label>
            <input type="text" name="slug" value="{{ old('slug', $service?->slug) }}" required
                class="w-full px-4 py-2 rounded-lg bg-white border border-ink-200 text-ink-50 focus:border-gold-300 outline-none" />
        </div>

        <div>
            <label class="block text-sm font-medium text-ink-500 mb-1">Label</label>
            <input type="text" name="label" value="{{ old('label', $service?->label) }}" required
                class="w-full px-4 py-2 rounded-lg bg-white border border-ink-200 text-ink-50 focus:border-gold-300 outline-none" />
        </div>

        <div>
            <label class="block text-sm font-medium text-ink-500 mb-1">Título</label>
            <input type="text" name="title" value="{{ old('title', $service?->title) }}" required
                class="w-full px-4 py-2 rounded-lg bg-white border border-ink-200 text-ink-50 focus:border-gold-300 outline-none" />
        </div>

        <div>
            <label class="block text-sm font-medium text-ink-500 mb-1">Ordem</label>
            <input type="number" name="sort_order" value="{{ old('sort_order', $service?->sort_order ?? 0) }}"
                class="w-full px-4 py-2 rounded-lg bg-white border border-ink-200 text-ink-50 focus:border-gold-300 outline-none" />
        </div>

        <div class="md:col-span-2">
            <label class="block text-sm font-medium text-ink-500 mb-1">Subtítulo</label>
            <input type="text" name="subtitle" value="{{ old('subtitle', $service?->subtitle) }}"
                class="w-full px-4 py-2 rounded-lg bg-white border border-ink-200 text-ink-50 focus:border-gold-300 outline-none" />
        </div>

        <div>
            <label class="block text-sm font-medium text-ink-500 mb-1">Banner / Imagem</label>
            <input type="file" name="banner_image" accept="image/*"
                class="w-full px-4 py-2 rounded-lg bg-white border border-ink-200 text-ink-50 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-gold-300 file:text-ink-50 hover:file:bg-gold-200" />
            @if ($service?->banner_image)
                <img src="{{ Str::startsWith($service->banner_image, ['http://', 'https://']) ? $service->banner_image : asset('storage/' . $service->banner_image) }}" alt="" class="mt-3 h-32 rounded-lg object-cover" />
            @endif
        </div>

        <div>
            <label class="block text-sm font-medium text-ink-500 mb-1">Alt do banner</label>
            <input type="text" name="banner_alt" value="{{ old('banner_alt', $service?->banner_alt) }}"
                class="w-full px-4 py-2 rounded-lg bg-white border border-ink-200 text-ink-50 focus:border-gold-300 outline-none" />
        </div>

        <div class="flex items-center gap-2">
            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $service?->is_active ?? true) ? 'checked' : '' }}
                class="w-4 h-4 rounded border-ink-200 bg-white text-gold-300" />
            <label class="text-sm text-ink-500">Activo</label>
        </div>
    </div>

    <div class="pt-4 border-t border-ink-200">
        <button type="submit" class="px-6 py-3 rounded-lg bg-gold-300 hover:bg-gold-200 text-ink-50 font-semibold transition-colors">
            Guardar categoria
        </button>
    </div>
</form>
