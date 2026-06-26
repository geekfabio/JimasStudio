<form method="POST" action="{{ $route }}" enctype="multipart/form-data" class="bg-white border border-ink-200 rounded-xl p-6 space-y-6">
    @csrf
    @method($method)

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="md:col-span-2">
            <label class="block text-sm font-medium text-ink-500 mb-1">Título</label>
            <input type="text" name="title" value="{{ old('title', $news?->title) }}" required
                class="w-full px-4 py-2 rounded-lg bg-white border border-ink-200 text-ink-50 focus:border-gold-300 outline-none" />
        </div>

        <div class="md:col-span-2">
            <label class="block text-sm font-medium text-ink-500 mb-1">Resumo</label>
            <textarea name="excerpt" rows="3"
                class="w-full px-4 py-2 rounded-lg bg-white border border-ink-200 text-ink-50 focus:border-gold-300 outline-none">{{ old('excerpt', $news?->excerpt) }}</textarea>
        </div>

        <div class="md:col-span-2">
            <label class="block text-sm font-medium text-ink-500 mb-2">Conteúdo</label>
            <input id="body" type="hidden" name="body" value="{{ old('body', $news?->body) }}" />
            <trix-editor input="body" class="trix-content bg-white border border-ink-200 rounded-lg text-ink-50 min-h-[300px]"></trix-editor>
        </div>

        <div>
            <label class="block text-sm font-medium text-ink-500 mb-1">Imagem de capa</label>
            <input type="file" name="cover_image" accept="image/*"
                class="w-full px-4 py-2 rounded-lg bg-white border border-ink-200 text-ink-50 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-gold-300 file:text-ink-50 hover:file:bg-gold-200" />
            @if ($news?->cover_image)
                <img src="{{ asset('storage/' . $news->cover_image) }}" alt="" class="mt-3 h-32 rounded-lg object-cover" />
            @endif
        </div>

        <div>
            <label class="block text-sm font-medium text-ink-500 mb-1">Ordem</label>
            <input type="number" name="sort_order" value="{{ old('sort_order', $news?->sort_order ?? 0) }}"
                class="w-full px-4 py-2 rounded-lg bg-white border border-ink-200 text-ink-50 focus:border-gold-300 outline-none" />
        </div>

        <div class="md:col-span-2 flex items-center gap-2">
            <input type="checkbox" name="is_published" value="1" {{ old('is_published', $news?->is_published) ? 'checked' : '' }}
                class="w-4 h-4 rounded border-ink-200 bg-white text-gold-300" />
            <label class="text-sm text-ink-500">Publicado</label>
        </div>
    </div>

    <div class="pt-4 border-t border-ink-200">
        <button type="submit" class="px-6 py-3 rounded-lg bg-gold-300 hover:bg-gold-200 text-ink-50 font-semibold transition-colors">
            Guardar notícia
        </button>
    </div>
</form>

<style>
    trix-toolbar .trix-button { background: #F1F5F9; color: #0F172A; border-color: #E2E8F0; }
    trix-toolbar .trix-button.trix-active { background: #27b3cb; color: #fff; }
    .trix-content { color: #0F172A; }
    .trix-content a { color: #27b3cb; }
</style>
