@extends('layouts.app')

@section('content')
    <section class="pt-32 pb-16 px-6">
        <div class="max-w-4xl mx-auto">
            <a href="{{ route('portfolio.index') }}" class="text-gold-300 text-sm font-semibold hover:underline mb-6 inline-block">← Voltar ao portfólio</a>

            <span class="section-label inline-block mb-4">{{ $item->category ?? 'Projecto' }}</span>
            <h1 class="font-display font-bold text-4xl md:text-5xl text-ink-50 mb-4">{{ $item->title }}</h1>
            @if ($item->client)
                <p class="text-ink-400 mb-8">Cliente: {{ $item->client }}</p>
            @endif

            <img src="{{ $item->cover_image ? asset('storage/' . $item->cover_image) : 'https://images.unsplash.com/photo-1497366216548-37526070297c?w=1200&h=600&fit=crop&auto=format&q=80' }}" alt="{{ $item->title }}" class="w-full h-96 object-cover rounded-2xl mb-10" />

            <div class="prose prose-lg prose-invert max-w-none text-ink-300 leading-relaxed mb-12">
                {!! nl2br(e($item->description)) !!}
            </div>

            @if ($item->gallery_images)
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach ($item->gallery_images as $image)
                        <img src="{{ asset('storage/' . $image) }}" alt="" class="w-full h-64 object-cover rounded-xl" />
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endsection
