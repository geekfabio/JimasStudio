@props(['addons'])

<div class="rounded-2xl border border-ink-700 bg-ink-800 p-6">
    <p class="section-label mb-4">Serviços adicionais</p>
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-4 text-center">
        @foreach ($addons as $addon)
            <div>
                <p class="text-gold-300 font-semibold text-sm">{{ $addon->price_display }}</p>
                <p class="text-ink-400 text-xs mt-1">{{ $addon->name }}</p>
            </div>
        @endforeach
    </div>
</div>
