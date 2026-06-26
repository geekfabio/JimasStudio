<form method="POST" action="{{ $route }}" class="bg-white border border-ink-200 rounded-xl p-6 space-y-6">
    @csrf
    @method($method)

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label class="block text-sm font-medium text-ink-500 mb-1">Categoria</label>
            <select name="category_id" required
                class="w-full px-4 py-2 rounded-lg bg-white border border-ink-200 text-ink-50 focus:border-gold-300 outline-none">
                <option value="">Seleccionar</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $plan?->category_id) == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-ink-500 mb-1">Sub-categoria</label>
            <select name="sub_category_id"
                class="w-full px-4 py-2 rounded-lg bg-white border border-ink-200 text-ink-50 focus:border-gold-300 outline-none">
                <option value="">Nenhuma</option>
                @foreach ($subCategories as $sub)
                    <option value="{{ $sub->id }}" {{ old('sub_category_id', $plan?->sub_category_id) == $sub->id ? 'selected' : '' }}>{{ $sub->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-ink-500 mb-1">Nome</label>
            <input type="text" name="name" value="{{ old('name', $plan?->name) }}" required
                class="w-full px-4 py-2 rounded-lg bg-white border border-ink-200 text-ink-50 focus:border-gold-300 outline-none" />
        </div>

        <div>
            <label class="block text-sm font-medium text-ink-500 mb-1">Preço</label>
            <input type="text" name="price" value="{{ old('price', $plan?->price) }}" required
                class="w-full px-4 py-2 rounded-lg bg-white border border-ink-200 text-ink-50 focus:border-gold-300 outline-none" />
        </div>

        <div>
            <label class="block text-sm font-medium text-ink-500 mb-1">Label do preço</label>
            <input type="text" name="price_label" value="{{ old('price_label', $plan?->price_label) }}"
                class="w-full px-4 py-2 rounded-lg bg-white border border-ink-200 text-ink-50 focus:border-gold-300 outline-none" />
        </div>

        <div>
            <label class="block text-sm font-medium text-ink-500 mb-1">Duração</label>
            <input type="text" name="duration" value="{{ old('duration', $plan?->duration) }}"
                class="w-full px-4 py-2 rounded-lg bg-white border border-ink-200 text-ink-50 focus:border-gold-300 outline-none" />
        </div>

        <div>
            <label class="block text-sm font-medium text-ink-500 mb-1">Ordem</label>
            <input type="number" name="sort_order" value="{{ old('sort_order', $plan?->sort_order ?? 0) }}"
                class="w-full px-4 py-2 rounded-lg bg-white border border-ink-200 text-ink-50 focus:border-gold-300 outline-none" />
        </div>

        <div class="md:col-span-2">
            <label class="block text-sm font-medium text-ink-500 mb-1">Descrição</label>
            <input type="text" name="description" value="{{ old('description', $plan?->description) }}"
                class="w-full px-4 py-2 rounded-lg bg-white border border-ink-200 text-ink-50 focus:border-gold-300 outline-none" />
        </div>

        <div class="md:col-span-2">
            <label class="block text-sm font-medium text-ink-500 mb-1">Funcionalidades (uma por linha)</label>
            <textarea name="features[]" rows="6"
                class="w-full px-4 py-2 rounded-lg bg-white border border-ink-200 text-ink-50 focus:border-gold-300 outline-none">{{ old('features', $plan ? $plan->features->pluck('text')->implode("\n") : '') }}</textarea>
            <p class="text-xs text-ink-500 mt-1">Separe cada funcionalidade com uma nova linha.</p>
        </div>

        <div class="flex items-center gap-4">
            <div class="flex items-center gap-2">
                <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $plan?->is_featured) ? 'checked' : '' }}
                    class="w-4 h-4 rounded border-ink-200 bg-white text-gold-300" />
                <label class="text-sm text-ink-500">Destaque</label>
            </div>
            <div class="flex items-center gap-2">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $plan?->is_active ?? true) ? 'checked' : '' }}
                    class="w-4 h-4 rounded border-ink-200 bg-white text-gold-300" />
                <label class="text-sm text-ink-500">Activo</label>
            </div>
        </div>
    </div>

    <div class="pt-4 border-t border-ink-200">
        <button type="submit" class="px-6 py-3 rounded-lg bg-gold-300 hover:bg-gold-200 text-ink-50 font-semibold transition-colors">
            Guardar plano
        </button>
    </div>
</form>
