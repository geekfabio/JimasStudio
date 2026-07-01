@extends('layouts.app')

@section('content')
    <section class="pt-28 md:pt-32 pb-12 md:pb-16 px-4 sm:px-6">
        <div class="max-w-4xl mx-auto">
            <a href="{{ route('portfolio.index') }}" class="text-gold-300 text-sm font-semibold hover:underline mb-5 sm:mb-6 inline-block">← Voltar ao portfólio</a>

            <div class="reveal">
                <span class="section-label inline-block mb-3 md:mb-4">{{ $item->category ?? 'Projecto' }}</span>
                <h1 class="font-display font-bold text-3xl sm:text-4xl md:text-5xl text-ink-50 mb-4">{{ $item->title }}</h1>
                @if ($item->client)
                    <p class="text-ink-400 mb-6 sm:mb-8">Cliente: {{ $item->client }}</p>
                @endif
            </div>

            <img src="{{ $item->cover_image ? asset('storage/' . $item->cover_image) : 'https://images.unsplash.com/photo-1497366216548-37526070297c?w=1200&h=600&fit=crop&auto=format&q=80' }}" alt="{{ $item->title }}" class="w-full h-64 sm:h-80 md:h-96 object-cover rounded-2xl mb-8 sm:mb-10 reveal" />

            <div class="prose prose-base sm:prose-lg max-w-none text-ink-300 leading-relaxed mb-10 md:mb-12 reveal">
                {!! nl2br(e($item->description)) !!}
            </div>

            @if ($item->gallery_images)
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 stagger-children">
                    @foreach ($item->gallery_images as $image)
                        <img src="{{ asset('storage/' . $image) }}" alt="" class="reveal w-full h-56 sm:h-64 object-cover rounded-xl" />
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endsection
