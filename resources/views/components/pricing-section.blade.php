@props(['category'])

<section id="{{ $category->slug }}" class="section-anchor py-16 md:py-20 px-4 sm:px-6">
    <div class="max-w-7xl mx-auto">
        <div class="mb-10 md:mb-12 text-center reveal">
            <span class="section-label block mb-3">{{ $category->label }}</span>
            <h2 class="font-display font-bold text-3xl sm:text-4xl md:text-5xl text-ink-50">{{ $category->title }}</h2>
            @if ($category->subtitle)
                <p class="text-ink-300 mt-3 max-w-xl mx-auto text-sm sm:text-base">{{ $category->subtitle }}</p>
            @endif
        </div>

        @if ($category->banner_image)
            <div class="section-banner mb-8 reveal">
                <img src="{{ $category->banner_image }}" alt="{{ $category->banner_alt }}" loading="lazy" />
                <div class="absolute inset-0 bg-gradient-to-t from-brand-dark/40 to-transparent"></div>
            </div>
        @endif

        @php
            $directPlans = $category->plans->where('sub_category_id', null);
            $columns = match ($directPlans->count()) {
                5 => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5',
                4 => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-4',
                3 => 'grid-cols-1 sm:grid-cols-3',
                default => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-4',
            };
        @endphp

        <div class="grid {{ $columns }} gap-4 sm:gap-5 mb-8 stagger-children">
            @foreach ($directPlans as $plan)
                <x-pricing-card :plan="$plan" :compact="$directPlans->count() >= 5" />
            @endforeach
        </div>

        @foreach ($category->subCategories as $subCategory)
            <div class="mb-3 mt-10 reveal">
                <p class="section-label mb-4">{{ $subCategory->name }}</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 sm:gap-5 mb-10 stagger-children">
                @foreach ($subCategory->plans as $plan)
                    <x-pricing-card :plan="$plan" compact />
                @endforeach
            </div>
        @endforeach

        @if ($category->addons->isNotEmpty())
            <div class="mt-10">
                <x-addon-grid :addons="$category->addons" />
            </div>
        @endif
    </div>
</section>

<div class="gold-divider max-w-7xl mx-auto"></div>
