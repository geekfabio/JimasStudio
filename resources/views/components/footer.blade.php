@php
    $whatsappUrl = whatsapp_url(setting('whatsapp_message', 'Olá, gostaria de saber mais sobre os serviços da JIMAS.'));
    $hasPortfolio = \App\Models\PortfolioItem::published()->exists();
    $hasNews = \App\Models\News::published()->exists();
@endphp

<footer class="bg-white border-t border-ink-700/20 pt-16 pb-8 px-6">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 mb-12">
        <div>
            <img src="{{ asset('images/logo.png') }}" alt="JIMAS" class="h-12 w-auto mb-4" />
            <p class="text-ink-400 text-sm leading-relaxed">
                Mais do que marketing, entregamos crescimento. Estratégias modernas de comunicação e posicionamento para empresas em Angola.
            </p>
        </div>

        <div>
            <h4 class="font-display font-bold text-ink-50 mb-4">Navegação</h4>
            <ul class="space-y-2 text-sm text-ink-400">
                <li><a href="{{ route('home') }}" class="hover:text-gold-300 transition-colors">Início</a></li>
                <li><a href="{{ route('pages.show', 'sobre-nos') }}" class="hover:text-gold-300 transition-colors">Empresa</a></li>
                <li><a href="{{ route('servicos') }}" class="hover:text-gold-300 transition-colors">Serviços</a></li>
                @if ($hasPortfolio)
                    <li><a href="{{ route('portfolio.index') }}" class="hover:text-gold-300 transition-colors">Portfólio</a></li>
                @endif
                @if ($hasNews)
                    <li><a href="{{ route('news.index') }}" class="hover:text-gold-300 transition-colors">Notícias</a></li>
                @endif
                <li><a href="{{ route('contact') }}" class="hover:text-gold-300 transition-colors">Contactos</a></li>
            </ul>
        </div>

        <div>
            <h4 class="font-display font-bold text-ink-50 mb-4">Contacto</h4>
            <ul class="space-y-2 text-sm text-ink-400">
                @if (setting('site_email'))
                    <li><a href="mailto:{{ setting('site_email') }}" class="hover:text-gold-300 transition-colors">{{ setting('site_email') }}</a></li>
                @endif
                @if (setting('site_phone'))
                    <li>{{ setting('site_phone') }}</li>
                @endif
                @if (setting('site_address'))
                    <li>{{ setting('site_address') }}</li>
                @endif
                <li><a href="{{ $whatsappUrl }}" target="_blank" class="text-gold-300 hover:underline">WhatsApp</a></li>
            </ul>
        </div>

        <div>
            <h4 class="font-display font-bold text-ink-50 mb-4">Redes Sociais</h4>
            <div class="flex flex-wrap gap-3">
                @if (setting('facebook_url'))
                    <a href="{{ setting('facebook_url') }}" target="_blank" class="text-ink-400 hover:text-gold-300 transition-colors">Facebook</a>
                @endif
                @if (setting('instagram_url'))
                    <a href="{{ setting('instagram_url') }}" target="_blank" class="text-ink-400 hover:text-gold-300 transition-colors">Instagram</a>
                @endif
                @if (setting('linkedin_url'))
                    <a href="{{ setting('linkedin_url') }}" target="_blank" class="text-ink-400 hover:text-gold-300 transition-colors">LinkedIn</a>
                @endif
                @if (setting('tiktok_url'))
                    <a href="{{ setting('tiktok_url') }}" target="_blank" class="text-ink-400 hover:text-gold-300 transition-colors">TikTok</a>
                @endif
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto border-t border-ink-700/10 pt-8 text-center">
        <p class="text-ink-400 text-sm">© {{ date('Y') }} JIMAS. Todos os direitos reservados.</p>
    </div>
</footer>
