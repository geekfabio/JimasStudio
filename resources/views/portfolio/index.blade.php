@extends('layouts.app')

@section('content')
    <section class="pt-28 md:pt-32 pb-12 md:pb-16 px-4 sm:px-6">
        <div class="max-w-7xl mx-auto">
            <div class="text-center max-w-2xl mx-auto mb-10 md:mb-16 reveal">
                <span class="section-label inline-block mb-3 md:mb-4">Portfólio</span>
                <h1 class="font-display font-bold text-3xl sm:text-4xl md:text-5xl text-ink-50 mb-4">Trabalhos realizados</h1>
                <p class="text-ink-300 text-sm sm:text-base">Projectos que reflectem a nossa criatividade, estratégia e compromisso com resultados.</p>
            </div>

            @if ($items->isNotEmpty())
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 md:gap-6 stagger-children">
                    @foreach ($items as $item)
                        <a href="{{ route('portfolio.show', $item->slug) }}" class="reveal group block relative rounded-2xl overflow-hidden h-72 sm:h-80 shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-200">
                            <img src="{{ $item->cover_image ? asset('storage/' . $item->cover_image) : 'https://images.unsplash.com/photo-1497366216548-37526070297c?w=600&h=450&fit=crop&auto=format&q=80' }}" alt="{{ $item->title }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
                            <div class="absolute inset-0 bg-gradient-to-t from-brand-dark/95 via-brand-dark/40 to-transparent"></div>
                            <div class="absolute bottom-0 left-0 p-5 sm:p-6">
                                <p class="text-brand-turquoise text-xs uppercase tracking-wider mb-1">{{ $item->category ?? 'Projecto' }}</p>
                                <h3 class="font-display font-bold text-lg sm:text-xl text-white">{{ $item->title }}</h3>
                                @if ($item->client)
                                    <p class="text-white/60 text-sm mt-1">{{ $item->client }}</p>
                                @endif
                            </div>
                        </a>
                    @endforeach
                </div>

                <div class="mt-10 md:mt-12">{{ $items->links() }}</div>
            @else
                <div class="text-center py-16 md:py-20 px-4 sm:px-6 bg-white border border-ink-700/10 rounded-2xl reveal">
                    <div class="w-16 h-16 mx-auto mb-6 rounded-full bg-gold-300/10 flex items-center justify-center">
                        <svg class="w-8 h-8 text-gold-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h2 class="font-display font-bold text-2xl text-ink-50 mb-3">Ainda não há projectos</h2>
                    <p class="text-ink-400 max-w-md mx-auto mb-8">Em breve partilharemos os nossos trabalhos e case studies mais recentes.</p>
                    <a href="{{ route('home') }}" class="inline-flex items-center gap-2 px-6 py-3 rounded-full text-white bg-gold-300 hover:bg-gold-200 transition-colors font-semibold">Voltar ao início</a>
                </div>
            @endif
        </div>
    </section>
@endsection
