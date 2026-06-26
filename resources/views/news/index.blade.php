@extends('layouts.app')

@section('content')
    <section class="pt-32 pb-16 px-6">
        <div class="max-w-7xl mx-auto">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="section-label inline-block mb-4">Notícias</span>
                <h1 class="font-display font-bold text-4xl md:text-5xl text-ink-50 mb-4">Últimas notícias</h1>
                <p class="text-ink-300">Actualizações, insights e novidades sobre marketing, comunicação e crescimento empresarial.</p>
            </div>

            @if ($news->isNotEmpty())
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($news as $item)
                        <article class="bg-white border border-ink-700 rounded-2xl overflow-hidden">
                            <img src="{{ $item->cover_image ? asset('storage/' . $item->cover_image) : 'https://images.unsplash.com/photo-1504711434969-e33886168f5c?w=600&h=350&fit=crop&auto=format&q=80' }}" alt="{{ $item->title }}" class="w-full h-52 object-cover" />
                            <div class="p-6">
                                <p class="text-ink-500 text-xs mb-2">{{ $item->published_at?->format('d/m/Y') }}</p>
                                <h2 class="font-display font-bold text-xl text-ink-50 mb-3">{{ $item->title }}</h2>
                                <p class="text-ink-400 text-sm mb-4 line-clamp-3">{{ $item->excerpt }}</p>
                                <a href="{{ route('news.show', $item->slug) }}" class="text-gold-300 text-sm font-semibold hover:underline">Ler mais →</a>
                            </div>
                        </article>
                    @endforeach
                </div>

                <div class="mt-12">{{ $news->links() }}</div>
            @else
                <div class="text-center py-20 px-6 bg-white border border-ink-700/10 rounded-2xl">
                    <div class="w-16 h-16 mx-auto mb-6 rounded-full bg-gold-300/10 flex items-center justify-center">
                        <svg class="w-8 h-8 text-gold-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>
                    </div>
                    <h2 class="font-display font-bold text-2xl text-ink-50 mb-3">Ainda não há notícias</h2>
                    <p class="text-ink-400 max-w-md mx-auto mb-8">Em breve partilharemos actualizações, insights e novidades sobre marketing e comunicação.</p>
                    <a href="{{ route('home') }}" class="inline-flex items-center gap-2 px-6 py-3 rounded-full text-white bg-gold-300 hover:bg-gold-200 transition-colors font-semibold">Voltar ao início</a>
                </div>
            @endif
        </div>
    </section>
@endsection
