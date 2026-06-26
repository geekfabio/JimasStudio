<form method="POST" action="{{ $route }}" class="bg-white border border-ink-200 rounded-xl p-6 space-y-6">
    @csrf
    @method($method)

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label class="block text-sm font-medium text-ink-500 mb-1">Slug</label>
            <input type="text" name="slug" value="{{ old('slug', $page?->slug) }}" required
                class="w-full px-4 py-2 rounded-lg bg-white border border-ink-200 text-ink-50 focus:border-gold-300 outline-none" />
            <p class="text-xs text-ink-500 mt-1">Ex: sobre-nos, empresa</p>
        </div>

        <div>
            <label class="block text-sm font-medium text-ink-500 mb-1">Título</label>
            <input type="text" name="title" value="{{ old('title', $page?->title) }}" required
                class="w-full px-4 py-2 rounded-lg bg-white border border-ink-200 text-ink-50 focus:border-gold-300 outline-none" />
        </div>

        <div>
            <label class="block text-sm font-medium text-ink-500 mb-1">Ordem</label>
            <input type="number" name="sort_order" value="{{ old('sort_order', $page?->sort_order ?? 0) }}"
                class="w-full px-4 py-2 rounded-lg bg-white border border-ink-200 text-ink-50 focus:border-gold-300 outline-none" />
        </div>

        <div class="flex items-center gap-2">
            <input type="checkbox" name="is_published" value="1" {{ old('is_published', $page?->is_published) ? 'checked' : '' }}
                class="w-4 h-4 rounded border-ink-200 bg-white text-gold-300" />
            <label class="text-sm text-ink-500">Publicado</label>
        </div>

        <div class="md:col-span-2">
            <label class="block text-sm font-medium text-ink-500 mb-2">Conteúdo</label>
            <input id="content" type="hidden" name="content" value="{{ old('content', $page?->content) }}" />
            <trix-editor input="content" class="trix-content bg-white border border-ink-200 rounded-lg text-ink-50 min-h-[400px]"></trix-editor>
        </div>
    </div>

    <div class="pt-4 border-t border-ink-200">
        <button type="submit" class="px-6 py-3 rounded-lg bg-gold-300 hover:bg-gold-200 text-ink-50 font-semibold transition-colors">
            Guardar página
        </button>
    </div>
</form>

<style>
    trix-toolbar .trix-button { background: #F1F5F9; color: #0F172A; border-color: #E2E8F0; }
    trix-toolbar .trix-button.trix-active { background: #27b3cb; color: #fff; }
    .trix-content { color: #0F172A; }
    .trix-content a { color: #27b3cb; }
</style>
