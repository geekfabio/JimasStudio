@extends('layouts.app')

@section('content')
    <article class="pb-16">
        <div class="pt-32 pb-8 px-6">
            <div class="max-w-3xl mx-auto">
                <a href="{{ route('news.index') }}" class="text-gold-300 text-sm font-semibold hover:underline inline-block">← Voltar às notícias</a>
            </div>
        </div>

        <header class="relative h-64 md:h-80 overflow-hidden">
            @if ($item->cover_image)
                <img src="{{ asset('storage/' . $item->cover_image) }}" alt="{{ $item->title }}" class="absolute inset-0 w-full h-full object-cover" />
            @else
                <div class="absolute inset-0 bg-ink-700"></div>
            @endif
            <div class="absolute inset-0 bg-gradient-to-t from-ink-900/90 via-ink-900/60 to-ink-900/40"></div>
            <div class="relative z-10 h-full flex items-end px-6 pb-10">
                <div class="max-w-3xl mx-auto w-full">
                    <p class="text-ink-300 text-sm mb-3">{{ $item->published_at?->format('d \d\e F \d\e Y') }}</p>
                    <h1 class="font-display font-bold text-3xl md:text-5xl text-white">{{ $item->title }}</h1>
                </div>
            </div>
        </header>

        <div class="max-w-3xl mx-auto px-6 pt-12">
            @if ($item->cover_image)
                <img src="{{ asset('storage/' . $item->cover_image) }}" alt="{{ $item->title }}" class="w-full h-96 object-cover rounded-2xl mb-10" />
            @endif

            <div class="prose prose-lg prose-invert max-w-none text-ink-300 leading-relaxed">
                {!! $item->body !!}
            </div>
        </div>
    </article>
@endsection
