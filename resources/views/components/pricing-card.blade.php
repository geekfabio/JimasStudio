@props(['plan', 'compact' => false])

@php
    $whatsappUrl = 'https://wa.me/244972465386';
    $marginTop = $compact ? 'mt-4' : 'mt-5';
@endphp

<div @class([
    'plan-card reveal rounded-2xl border bg-brand-dark p-6 flex flex-col relative overflow-hidden',
    'featured-card' => $plan->is_featured,
    'border-white/10' => !$plan->is_featured,
])>
    @if ($plan->is_featured)
        <div class="absolute top-0 right-0 left-0 h-0.5 bg-gradient-to-r from-transparent via-brand-turquoise to-transparent"></div>
    @endif

    <span @class([
        'text-xs px-3 py-1 rounded-full self-start mb-4',
        'font-semibold text-white bg-brand-turquoise' => $plan->is_featured,
        'badge-gold' => !$plan->is_featured,
    ])>
        {{ $plan->name }}
    </span>

    <p class="font-display font-bold {{ $compact ? 'text-2xl' : 'text-3xl' }} text-white mb-1">
        {{ $plan->price }} <span class="{{ $compact ? 'text-base' : 'text-lg' }} text-white/60">{{ $plan->price_label }}</span>
    </p>

    @if ($plan->duration)
        <p class="text-brand-turquoise {{ $compact ? 'text-xs mb-4' : 'text-xs mb-5' }}">{{ $plan->duration }}</p>
    @endif

    <ul class="space-y-{{ $compact ? '1.5' : '2' }} text-sm text-white/80 flex-1">
        @foreach ($plan->features as $feature)
            <li class="flex gap-2">
                <span class="text-brand-turquoise {{ $compact ? '' : 'mt-0.5' }}">✓</span>
                {{ $feature->text }}
            </li>
        @endforeach
    </ul>

    @if ($plan->description)
        <p class="text-white/50 {{ $compact ? 'text-xs mt-4' : 'text-xs mt-5' }}">{{ $plan->description }}</p>
    @endif

    @php
        $buttonClasses = $plan->is_featured
            ? 'bg-brand-turquoise text-white font-semibold hover:bg-gold-300'
            : 'border border-white/20 text-white hover:border-brand-turquoise hover:text-brand-turquoise';
        $paddingClasses = $compact ? 'py-2 text-xs' : 'py-2.5 text-sm';
    @endphp

    <a href="{{ $whatsappUrl }}" target="_blank"
        class="{{ $marginTop }} block text-center rounded-xl transition-all {{ $paddingClasses }} {{ $buttonClasses }}">
        Reservar
    </a>
</div>
