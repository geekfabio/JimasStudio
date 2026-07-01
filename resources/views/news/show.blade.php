@extends('layouts.app')

@section('content')
    <article class="pb-16">
        <div class="pt-28 md:pt-32 pb-6 md:pb-8 px-4 sm:px-6">
            <div class="max-w-3xl mx-auto">
                <a href="{{ route('news.index') }}" class="text-gold-300 text-sm font-semibold hover:underline inline-block">← Voltar às notícias</a>
            </div>
        </div>

        <header class="relative h-56 sm:h-64 md:h-80 overflow-hidden">
            @if ($item->cover_image)
                <img src="{{ asset('storage/' . $item->cover_image) }}" alt="{{ $item->title }}" class="absolute inset-0 w-full h-full object-cover" />
            @else
                <div class="absolute inset-0 bg-brand-dark"></div>
            @endif
            <div class="absolute inset-0 bg-gradient-to-t from-brand-dark/95 via-brand-dark/60 to-brand-dark/40"></div>
            <div class="relative z-10 h-full flex items-end px-4 sm:px-6 pb-8 sm:pb-10">
                <div class="max-w-3xl mx-auto w-full">
                    <p class="text-white/70 text-sm mb-3">{{ $item->published_at?->format('d \d\e F \d\e Y') }}</p>
                    <h1 class="font-display font-bold text-2xl sm:text-3xl md:text-5xl text-white">{{ $item->title }}</h1>
                </div>
            </div>
        </header>

        <div class="max-w-3xl mx-auto px-4 sm:px-6 pt-10 md:pt-12 reveal">
            @if ($item->cover_image)
                <img src="{{ asset('storage/' . $item->cover_image) }}" alt="{{ $item->title }}" class="w-full h-64 sm:h-96 object-cover rounded-2xl mb-8 sm:mb-10" />
            @endif

            <div class="prose prose-base sm:prose-lg max-w-none text-ink-300 leading-relaxed">
                {!! $item->body !!}
            </div>
        </div>
    </article>
@endsection
