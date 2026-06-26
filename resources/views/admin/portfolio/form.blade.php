<form method="POST" action="{{ $route }}" enctype="multipart/form-data" class="bg-white border border-ink-200 rounded-xl p-6 space-y-6">
    @csrf
    @method($method)

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label class="block text-sm font-medium text-ink-500 mb-1">Título</label>
            <input type="text" name="title" value="{{ old('title', $portfolio?->title) }}" required
                class="w-full px-4 py-2 rounded-lg bg-white border border-ink-200 text-ink-50 focus:border-gold-300 outline-none" />
        </div>

        <div>
            <label class="block text-sm font-medium text-ink-500 mb-1">Cliente</label>
            <input type="text" name="client" value="{{ old('client', $portfolio?->client) }}"
                class="w-full px-4 py-2 rounded-lg bg-white border border-ink-200 text-ink-50 focus:border-gold-300 outline-none" />
        </div>

        <div>
            <label class="block text-sm font-medium text-ink-500 mb-1">Categoria</label>
            <input type="text" name="category" value="{{ old('category', $portfolio?->category) }}"
                class="w-full px-4 py-2 rounded-lg bg-white border border-ink-200 text-ink-50 focus:border-gold-300 outline-none" />
        </div>

        <div>
            <label class="block text-sm font-medium text-ink-500 mb-1">Ordem</label>
            <input type="number" name="sort_order" value="{{ old('sort_order', $portfolio?->sort_order ?? 0) }}"
                class="w-full px-4 py-2 rounded-lg bg-white border border-ink-200 text-ink-50 focus:border-gold-300 outline-none" />
        </div>

        <div class="md:col-span-2">
            <label class="block text-sm font-medium text-ink-500 mb-1">Descrição</label>
            <textarea name="description" rows="4"
                class="w-full px-4 py-2 rounded-lg bg-white border border-ink-200 text-ink-50 focus:border-gold-300 outline-none">{{ old('description', $portfolio?->description) }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-ink-500 mb-1">Imagem de capa</label>
            <input type="file" name="cover_image" accept="image/*"
                class="w-full px-4 py-2 rounded-lg bg-white border border-ink-200 text-ink-50 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-gold-300 file:text-ink-50 hover:file:bg-gold-200" />
            @if ($portfolio?->cover_image)
                <img src="{{ asset('storage/' . $portfolio->cover_image) }}" alt="" class="mt-3 h-32 rounded-lg object-cover" />
            @endif
        </div>

        <div>
            <label class="block text-sm font-medium text-ink-500 mb-1">Galeria (múltiplas imagens)</label>
            <input type="file" name="gallery_images[]" accept="image/*" multiple
                class="w-full px-4 py-2 rounded-lg bg-white border border-ink-200 text-ink-50 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-gold-300 file:text-ink-50 hover:file:bg-gold-200" />
            @if ($portfolio?->gallery_images)
                <div class="flex gap-2 mt-3 flex-wrap">
                    @foreach ($portfolio->gallery_images as $image)
                        <img src="{{ asset('storage/' . $image) }}" alt="" class="h-20 rounded-lg object-cover" />
                    @endforeach
                </div>
            @endif
        </div>

        <div class="md:col-span-2 flex items-center gap-2">
            <input type="checkbox" name="is_published" value="1" {{ old('is_published', $portfolio?->is_published) ? 'checked' : '' }}
                class="w-4 h-4 rounded border-ink-200 bg-white text-gold-300" />
            <label class="text-sm text-ink-500">Publicado</label>
        </div>
    </div>

    <div class="pt-4 border-t border-ink-200">
        <button type="submit" class="px-6 py-3 rounded-lg bg-gold-300 hover:bg-gold-200 text-ink-50 font-semibold transition-colors">
            Guardar item
        </button>
    </div>
</form>
