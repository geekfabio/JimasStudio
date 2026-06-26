@php
    $whatsappUrl = whatsapp_url(setting('whatsapp_message', 'Olá, gostaria de saber mais sobre os serviços da JIMAS.'));
    $hasPortfolio = \App\Models\PortfolioItem::published()->exists();
    $hasNews = \App\Models\News::published()->exists();
@endphp

<nav id="navbar" class="fixed top-0 left-0 right-0 z-50 px-6 py-4">
    <div class="max-w-7xl mx-auto flex items-center justify-between">
        <a href="{{ route('home') }}" aria-label="JIMAS — Início">
            <img src="{{ asset('images/logo.png') }}" alt="JIMAS" class="h-10 w-auto" />
        </a>

        <div class="hidden lg:flex items-center gap-8 text-sm font-medium text-ink-200">
            <a href="{{ route('home') }}" class="hover:text-gold-300 transition-colors {{ request()->routeIs('home') ? 'text-gold-300' : '' }}">Início</a>
            <a href="{{ route('pages.show', 'sobre-nos') }}" class="hover:text-gold-300 transition-colors {{ request()->routeIs('pages.show') ? 'text-gold-300' : '' }}">Empresa</a>
            <a href="{{ route('servicos') }}" class="hover:text-gold-300 transition-colors {{ request()->routeIs('servicos') ? 'text-gold-300' : '' }}">Serviços</a>
            @if ($hasPortfolio)
                <a href="{{ route('portfolio.index') }}" class="hover:text-gold-300 transition-colors {{ request()->routeIs('portfolio.*') ? 'text-gold-300' : '' }}">Portfólio</a>
            @endif
            @if ($hasNews)
                <a href="{{ route('news.index') }}" class="hover:text-gold-300 transition-colors {{ request()->routeIs('news.*') ? 'text-gold-300' : '' }}">Notícias</a>
            @endif
            <a href="{{ route('contact') }}" class="hover:text-gold-300 transition-colors {{ request()->routeIs('contact') ? 'text-gold-300' : '' }}">Contactos</a>
        </div>

        <a href="{{ $whatsappUrl }}" target="_blank"
            class="hidden lg:inline-flex items-center gap-2 px-4 py-2 rounded-full text-sm font-semibold text-white bg-gold-300 hover:bg-gold-200 transition-colors">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z" />
                <path d="M12 0C5.373 0 0 5.373 0 12c0 2.124.558 4.118 1.532 5.845L0 24l6.332-1.51A11.94 11.94 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.818a9.804 9.804 0 01-5.003-1.367l-.36-.214-3.755.896.929-3.654-.234-.376A9.78 9.78 0 012.182 12c0-5.418 4.4-9.818 9.818-9.818 5.418 0 9.818 4.4 9.818 9.818 0 5.418-4.4 9.818-9.818 9.818z" />
            </svg>
            Falar connosco
        </a>

        <button id="menu-btn" class="lg:hidden text-ink-200 hover:text-gold-300" aria-label="Menu">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    <div id="mobile-menu" class="lg:hidden bg-ink-900 border-t border-ink-700 mt-4 rounded-2xl overflow-hidden">
        <div class="flex flex-col p-4 gap-3 text-sm font-medium text-ink-200">
            <a href="{{ route('home') }}" class="hover:text-gold-300 py-1">Início</a>
            <a href="{{ route('pages.show', 'sobre-nos') }}" class="hover:text-gold-300 py-1">Empresa</a>
            <a href="{{ route('servicos') }}" class="hover:text-gold-300 py-1">Serviços</a>
            @if ($hasPortfolio)
                <a href="{{ route('portfolio.index') }}" class="hover:text-gold-300 py-1">Portfólio</a>
            @endif
            @if ($hasNews)
                <a href="{{ route('news.index') }}" class="hover:text-gold-300 py-1">Notícias</a>
            @endif
            <a href="{{ route('contact') }}" class="hover:text-gold-300 py-1">Contactos</a>
            <a href="{{ $whatsappUrl }}" target="_blank" class="wa-btn mt-2 text-center py-2 rounded-full text-white font-semibold">WhatsApp</a>
        </div>
    </div>
</nav>
