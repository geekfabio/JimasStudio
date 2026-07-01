@extends('layouts.app')

@section('content')
    @php
        $whatsappUrl = whatsapp_url(setting('whatsapp_message', 'Olá, gostaria de saber mais sobre os serviços da JIMAS.'));
    @endphp

    <!-- Hero -->
    <section class="min-h-[88vh] md:min-h-[92vh] flex flex-col items-center justify-center relative overflow-hidden pt-28 pb-20 md:pt-32 md:pb-24 px-4 sm:px-6">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?w=1920&h=1080&fit=crop&auto=format&q=80" alt="" class="w-full h-full object-cover" />
            <div class="absolute inset-0 bg-gradient-to-br from-white/95 via-white/90 to-gold-50/70"></div>
        </div>
        <div class="absolute inset-0 opacity-[0.03]" style="background-image: repeating-linear-gradient(45deg, #27b3cb 0, #3B82F6 1px, transparent 0, transparent 50%); background-size: 24px 24px;"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[400px] h-[400px] md:w-[700px] md:h-[700px] rounded-full opacity-[0.10]" style="background: radial-gradient(circle, #25B6CD 0%, transparent 70%);"></div>

        <div class="relative z-10 text-center max-w-5xl mx-auto">
            <span class="section-label inline-block mb-5 md:mb-8 animate-fade-in-up" style="animation-delay: 0.1s;">Marketing & Comunicação · Angola</span>
            <h1 class="hero-title font-display font-extrabold tracking-tight mb-6 md:mb-8 text-ink-50 animate-fade-in-up" style="animation-delay: 0.2s;">
                Quem somos<br />
                <span class="gold-text">mais do que marketing,</span><br />
                entregamos crescimento.
            </h1>
            <p class="text-ink-300 text-base sm:text-lg md:text-xl lg:text-2xl max-w-3xl mx-auto mb-8 md:mb-12 leading-relaxed animate-fade-in-up" style="animation-delay: 0.3s;">
                {{ setting('home_hero_subtitle', 'Estratégias inteligentes de marketing, comunicação e posicionamento para empresas que querem crescer com autoridade e resultados concretos.') }}
            </p>
            <div class="flex flex-col sm:flex-row flex-wrap justify-center gap-3 sm:gap-4 animate-fade-in-up" style="animation-delay: 0.4s;">
                <a href="{{ route('servicos') }}" class="cursor-pointer px-6 py-3.5 sm:px-8 sm:py-4 rounded-full text-white bg-gold-300 hover:bg-brand-turquoise transition-all duration-200 font-semibold shadow-md hover:shadow-lg hover:-translate-y-0.5">
                    Ver serviços
                </a>
                <a href="{{ $whatsappUrl }}" target="_blank" class="cursor-pointer px-6 py-3.5 sm:px-8 sm:py-4 rounded-full border-2 border-ink-600 text-ink-200 hover:border-brand-turquoise hover:text-brand-turquoise transition-all duration-200 font-semibold">
                    Falar connosco
                </a>
            </div>
        </div>
    </section>

    <div class="gold-divider max-w-7xl mx-auto"></div>

    <!-- Sobre Nós -->
    @if ($aboutPage)
        <section class="py-20 md:py-28 px-4 sm:px-6">
            <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 items-center">
                <div class="reveal">
                    <span class="section-label inline-block mb-5">Quem Somos</span>
                    <h2 class="font-display font-bold text-3xl sm:text-4xl md:text-5xl text-ink-50 mb-6 md:mb-8 leading-tight">{{ $aboutPage->title }}</h2>
                    <div class="prose prose-base sm:prose-lg max-w-none text-ink-300 leading-relaxed line-clamp-6">
                        {!! $aboutPage->content !!}
                    </div>
                    <a href="{{ route('pages.show', $aboutPage->slug) }}" class="cursor-pointer inline-flex items-center gap-2 mt-8 md:mt-10 px-6 py-3.5 sm:px-8 sm:py-4 rounded-full border-2 border-ink-600 text-ink-200 hover:border-gold-300 hover:text-gold-300 transition-all duration-200 font-semibold">
                        Saber mais
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
                <div class="relative rounded-3xl overflow-hidden h-80 sm:h-[28rem] shadow-xl reveal reveal-delay-2">
                    <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?w=800&h=600&fit=crop&auto=format&q=80" alt="Equipa JIMAS" class="w-full h-full object-cover" />
                </div>
            </div>
        </section>
    @endif

    <!-- Serviços -->
    @if ($services->isNotEmpty())
        <section class="py-20 md:py-28 px-4 sm:px-6 bg-brand-dark">
            <div class="max-w-7xl mx-auto">
                <div class="text-center max-w-2xl mx-auto mb-12 md:mb-20 reveal">
                    <span class="section-label inline-block mb-5">Nossos Serviços</span>
                    <h2 class="font-display font-bold text-3xl sm:text-4xl md:text-5xl text-white mb-5">Da estratégia à execução</h2>
                    <p class="text-white/70 text-base sm:text-lg">Cobrimos todas as áreas para posicionar a tua empresa como referência no mercado.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8 stagger-children">
                    @foreach ($services as $service)
                        <a href="{{ route('servicos') }}#{{ $service->slug }}" class="reveal cursor-pointer group block bg-white/5 backdrop-blur-sm rounded-2xl p-6 sm:p-8 border border-white/10 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-200">
                            <div class="w-12 h-12 rounded-xl bg-brand-turquoise/15 text-brand-turquoise flex items-center justify-center mb-6 group-hover:bg-brand-turquoise group-hover:text-white transition-colors duration-200">
                                <x-service-icon :name="$service->icon ?? 'star'" class="w-6 h-6" />
                            </div>
                            <h3 class="font-display font-bold text-xl text-white mb-3">{{ $service->title }}</h3>
                            <p class="text-white/70 text-sm leading-relaxed mb-5">{{ $service->subtitle }}</p>
                            <span class="inline-flex items-center gap-1 text-brand-turquoise text-sm font-semibold group-hover:gap-2 transition-all duration-200">
                                Ver detalhes
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                            </span>
                        </a>
                    @endforeach
                </div>

                <div class="text-center mt-12 md:mt-16 reveal">
                    <a href="{{ route('servicos') }}" class="cursor-pointer inline-flex items-center gap-2 px-6 py-3.5 sm:px-8 sm:py-4 rounded-full text-white bg-brand-turquoise hover:bg-gold-300 transition-all duration-200 font-semibold shadow-md hover:shadow-lg hover:-translate-y-0.5">
                        Ver todos os serviços
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
            </div>
        </section>
    @endif

    <!-- Portfólio -->
    @if ($portfolio->isNotEmpty())
        <section class="py-20 md:py-28 px-4 sm:px-6">
            <div class="max-w-7xl mx-auto">
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 md:gap-6 mb-10 md:mb-16 reveal">
                    <div>
                        <span class="section-label inline-block mb-3 md:mb-5">Portfólio</span>
                        <h2 class="font-display font-bold text-3xl sm:text-4xl md:text-5xl text-ink-50">Trabalhos seleccionados</h2>
                    </div>
                    <a href="{{ route('portfolio.index') }}" class="hidden md:inline-flex items-center gap-2 text-gold-300 font-semibold hover:gap-3 transition-all duration-200">
                        Ver portfólio
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8 stagger-children">
                    @foreach ($portfolio as $item)
                        <a href="{{ route('portfolio.show', $item->slug) }}" class="reveal cursor-pointer group block relative rounded-2xl overflow-hidden h-72 sm:h-80 shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-200">
                            <img src="{{ $item->cover_image ? asset('storage/' . $item->cover_image) : 'https://images.unsplash.com/photo-1497366216548-37526070297c?w=600&h=400&fit=crop&auto=format&q=80' }}" alt="{{ $item->title }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
                            <div class="absolute inset-0 bg-gradient-to-t from-brand-dark/95 via-brand-dark/40 to-transparent"></div>
                            <div class="absolute bottom-0 left-0 p-6 sm:p-7">
                                <p class="text-brand-turquoise text-xs uppercase tracking-wider mb-2">{{ $item->category ?? 'Projecto' }}</p>
                                <h3 class="font-display font-bold text-lg sm:text-xl text-white">{{ $item->title }}</h3>
                            </div>
                        </a>
                    @endforeach
                </div>

                <div class="text-center mt-12 md:hidden">
                    <a href="{{ route('portfolio.index') }}" class="cursor-pointer inline-flex items-center gap-2 text-gold-300 font-semibold hover:gap-3 transition-all duration-200">
                        Ver portfólio
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
            </div>
        </section>
    @endif

    <!-- Notícias -->
    @if ($news->isNotEmpty())
        <section class="py-20 md:py-28 px-4 sm:px-6 bg-brand-dark">
            <div class="max-w-7xl mx-auto">
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 md:gap-6 mb-10 md:mb-16 reveal">
                    <div>
                        <span class="section-label inline-block mb-3 md:mb-5">Notícias</span>
                        <h2 class="font-display font-bold text-3xl sm:text-4xl md:text-5xl text-white">Últimas actualizações</h2>
                    </div>
                    <a href="{{ route('news.index') }}" class="hidden md:inline-flex items-center gap-2 text-brand-turquoise font-semibold hover:gap-3 transition-all duration-200">
                        Ver todas
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8 stagger-children">
                    @foreach ($news as $item)
                        <article class="reveal group bg-white/5 backdrop-blur-sm rounded-2xl overflow-hidden border border-white/10 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-200">
                            <a href="{{ route('news.show', $item->slug) }}" class="cursor-pointer block relative h-48 sm:h-52 overflow-hidden">
                                <img src="{{ $item->cover_image ? asset('storage/' . $item->cover_image) : 'https://images.unsplash.com/photo-1504711434969-e33886168f5c?w=600&h=350&fit=crop&auto=format&q=80' }}" alt="{{ $item->title }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
                            </a>
                            <div class="p-5 sm:p-7">
                                <p class="text-white/50 text-xs uppercase tracking-wider mb-3">{{ $item->published_at?->format('d/m/Y') }}</p>
                                <h3 class="font-display font-bold text-lg text-white mb-3 group-hover:text-brand-turquoise transition-colors duration-200">
                                    <a href="{{ route('news.show', $item->slug) }}" class="cursor-pointer">{{ $item->title }}</a>
                                </h3>
                                <p class="text-white/70 text-sm mb-5 line-clamp-3 leading-relaxed">{{ $item->excerpt }}</p>
                                <a href="{{ route('news.show', $item->slug) }}" class="cursor-pointer inline-flex items-center gap-1 text-brand-turquoise text-sm font-semibold hover:gap-2 transition-all duration-200">
                                    Ler mais
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>

                <div class="text-center mt-12 md:hidden">
                    <a href="{{ route('news.index') }}" class="cursor-pointer inline-flex items-center gap-2 text-gold-300 font-semibold hover:gap-3 transition-all duration-200">
                        Ver todas
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
            </div>
        </section>
    @endif

    <!-- Contacto / CTA -->
    <section class="py-20 md:py-28 px-4 sm:px-6 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-white via-gold-50/60 to-white"></div>
        <div class="absolute inset-0 opacity-[0.03]" style="background-image: repeating-linear-gradient(45deg, #27b3cb 0, #3B82F6 1px, transparent 0, transparent 50%); background-size: 24px 24px;"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] md:w-[700px] md:h-[700px] rounded-full opacity-[0.08]" style="background: radial-gradient(circle, #25B6CD 0%, transparent 70%);"></div>

        <div class="relative z-10 max-w-7xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-20 items-center">
                <!-- Copy -->
                <div class="text-center lg:text-left reveal">
                    <span class="section-label inline-block mb-5 md:mb-6">Vamos trabalhar juntos</span>
                    <h2 class="font-display font-bold text-3xl sm:text-4xl md:text-5xl lg:text-6xl text-ink-50 mb-5 md:mb-6 leading-tight">Pronto para transformar a tua empresa?</h2>
                    <p class="text-ink-300 text-base sm:text-lg md:text-xl mb-8 md:mb-10 max-w-xl mx-auto lg:mx-0">Envia-nos uma mensagem ou fala connosco pelo WhatsApp. A JIMAS ajuda-te a posicionar o teu negócio como referência no mercado.</p>
                    <a href="{{ $whatsappUrl }}" target="_blank" class="cursor-pointer wa-btn inline-flex items-center justify-center gap-3 px-8 py-4 sm:px-10 sm:py-5 rounded-full text-white font-semibold text-base sm:text-lg shadow-lg hover:shadow-xl transition-all duration-200 hover:-translate-y-0.5">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z" />
                            <path d="M12 0C5.373 0 0 5.373 0 12c0 2.124.558 4.118 1.532 5.845L0 24l6.332-1.51A11.94 11.94 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.818a9.804 9.804 0 01-5.003-1.367l-.36-.214-3.755.896.929-3.654-.234-.376A9.78 9.78 0 012.182 12c0-5.418 4.4-9.818 9.818-9.818 5.418 0 9.818 4.4 9.818 9.818 0 5.418-4.4 9.818-9.818 9.818z" />
                        </svg>
                        Falar no WhatsApp
                    </a>
                </div>

                <!-- Formulário -->
                <div class="bg-white rounded-3xl p-6 sm:p-8 md:p-10 border border-ink-700/10 shadow-xl hover:shadow-2xl transition-shadow duration-300 reveal reveal-delay-2">
                    <h3 class="font-display font-bold text-2xl text-ink-50 mb-2">Envia-nos uma mensagem</h3>
                    <p class="text-ink-400 text-sm mb-8">Preenche o formulário abaixo e entraremos em contacto brevemente.</p>

                    @if (session('success'))
                        <div class="mb-6 px-4 py-3 rounded-xl bg-green-500/10 border border-green-500/30 text-green-600 text-sm">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('contact.store') }}" class="space-y-5">
                        @csrf

                        <div>
                            <label for="home-name" class="block text-sm font-medium text-ink-300 mb-1.5">Nome</label>
                            <input type="text" id="home-name" name="name" value="{{ old('name') }}" required
                                class="w-full px-4 py-3 rounded-xl bg-white border border-ink-700/20 text-ink-50 placeholder-ink-500 focus:border-gold-300 focus:ring-4 focus:ring-gold-300/20 outline-none transition-all duration-200" />
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label for="home-email" class="block text-sm font-medium text-ink-300 mb-1.5">Email</label>
                                <input type="email" id="home-email" name="email" value="{{ old('email') }}" required
                                    class="w-full px-4 py-3 rounded-xl bg-white border border-ink-700/20 text-ink-50 placeholder-ink-500 focus:border-gold-300 focus:ring-4 focus:ring-gold-300/20 outline-none transition-all duration-200" />
                            </div>
                            <div>
                                <label for="home-phone" class="block text-sm font-medium text-ink-300 mb-1.5">Telefone</label>
                                <input type="text" id="home-phone" name="phone" value="{{ old('phone') }}"
                                    class="w-full px-4 py-3 rounded-xl bg-white border border-ink-700/20 text-ink-50 placeholder-ink-500 focus:border-gold-300 focus:ring-4 focus:ring-gold-300/20 outline-none transition-all duration-200" />
                            </div>
                        </div>

                        <div>
                            <label for="home-subject" class="block text-sm font-medium text-ink-300 mb-1.5">Assunto</label>
                            <input type="text" id="home-subject" name="subject" value="{{ old('subject') }}" required
                                class="w-full px-4 py-3 rounded-xl bg-white border border-ink-700/20 text-ink-50 placeholder-ink-500 focus:border-gold-300 focus:ring-4 focus:ring-gold-300/20 outline-none transition-all duration-200" />
                        </div>

                        <div>
                            <label for="home-message" class="block text-sm font-medium text-ink-300 mb-1.5">Mensagem</label>
                            <textarea id="home-message" name="message" rows="4" required
                                class="w-full px-4 py-3 rounded-xl bg-white border border-ink-700/20 text-ink-50 placeholder-ink-500 focus:border-gold-300 focus:ring-4 focus:ring-gold-300/20 outline-none transition-all duration-200 resize-none">{{ old('message') }}</textarea>
                        </div>

                        <button type="submit" class="cursor-pointer w-full px-6 py-4 rounded-xl bg-gold-300 hover:bg-gold-200 text-white font-semibold shadow-md hover:shadow-lg hover:-translate-y-0.5 transition-all duration-200">
                            Enviar mensagem
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
