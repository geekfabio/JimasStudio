@extends('layouts.app')

@section('content')
    @php
        $whatsappUrl = whatsapp_url(setting('whatsapp_message', 'Olá, gostaria de saber mais sobre a JIMAS.'));

        // Divide o conteúdo em secções com base nos <h3>
        $parts = preg_split('/<h3[^>]*>(.*?)<\/h3>/i', $page->content, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);
        $sections = [];
        $intro = '';

        if (count($parts) > 1) {
            $intro = array_shift($parts);
            for ($i = 0; $i < count($parts); $i += 2) {
                $title = $parts[$i] ?? '';
                $body = $parts[$i + 1] ?? '';
                $sections[] = ['title' => $title, 'body' => $body];
            }
        } else {
            $intro = $page->content;
        }
    @endphp

    <!-- Hero -->
    <section class="relative pt-28 pb-16 md:pt-32 md:pb-20 px-4 sm:px-6 overflow-hidden">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?w=1920&h=800&fit=crop&auto=format&q=80" alt="" class="w-full h-full object-cover" />
            <div class="absolute inset-0 bg-gradient-to-br from-white/95 via-white/90 to-gold-50/70"></div>
        </div>
        <div class="absolute inset-0 opacity-5" style="background-image: repeating-linear-gradient(45deg, #27b3cb 0, #3B82F6 1px, transparent 0, transparent 50%); background-size: 20px 20px;"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[350px] h-[350px] md:w-[600px] md:h-[600px] rounded-full opacity-[0.10]" style="background: radial-gradient(circle, #25B6CD 0%, transparent 70%);"></div>

        <div class="relative z-10 max-w-4xl mx-auto text-center px-2">
            <span class="section-label inline-block mb-3 md:mb-4 animate-fade-in-up" style="animation-delay: 0.1s;">Sobre Nós</span>
            <h1 class="hero-title font-display font-extrabold text-ink-50 mb-4 md:mb-6 animate-fade-in-up" style="animation-delay: 0.2s;">
                {{ $page->title }}
            </h1>
            <p class="text-ink-300 text-base sm:text-lg md:text-xl max-w-2xl mx-auto animate-fade-in-up" style="animation-delay: 0.3s;">
                Conheça a JIMAS, a equipa e a missão que nos move todos os dias.
            </p>
        </div>
    </section>

    <div class="gold-divider max-w-7xl mx-auto"></div>

    <!-- Introdução -->
    @if (trim(strip_tags($intro)) !== '')
        <section class="py-12 md:py-20 px-4 sm:px-6">
            <div class="max-w-4xl mx-auto reveal">
                <div class="prose prose-base sm:prose-lg max-w-none text-ink-300 leading-relaxed text-center">
                    {!! $intro !!}
                </div>
            </div>
        </section>
    @endif

    <!-- Secções em cards -->
    @if (count($sections) > 0)
        <section class="py-8 md:py-16 px-4 sm:px-6 bg-brand-dark">
            <div class="max-w-7xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6 stagger-children">
                    @foreach ($sections as $section)
                        @php
                            $title = trim(strip_tags($section['title']));
                            $isWhyUs = str_contains(strtolower($title), 'por que');
                        @endphp

                        @if ($isWhyUs)
                            <div class="reveal md:col-span-2">
                                <div class="bg-white/5 backdrop-blur-sm rounded-2xl p-6 sm:p-8 md:p-10 shadow-sm border border-white/10">
                                    <h2 class="font-display font-bold text-2xl sm:text-3xl text-white mb-4 sm:mb-6 text-center">{{ $section['title'] }}</h2>
                                    <div class="prose prose-sm sm:prose-base max-w-none text-white/80 leading-relaxed">
                                        {!! $section['body'] !!}
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="reveal bg-white/5 backdrop-blur-sm rounded-2xl p-5 sm:p-6 md:p-8 shadow-sm border border-white/10">
                                <h2 class="font-display font-bold text-xl sm:text-2xl text-white mb-3 sm:mb-4">{{ $section['title'] }}</h2>
                                <div class="prose prose-sm sm:prose-base max-w-none text-white/80 leading-relaxed">
                                    {!! $section['body'] !!}
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- CTA final -->
    <section class="py-16 md:py-24 px-4 sm:px-6 text-center relative overflow-hidden">
        <div class="absolute inset-0 opacity-5" style="background-image: repeating-linear-gradient(45deg, #27b3cb 0, #3B82F6 1px, transparent 0, transparent 50%); background-size: 20px 20px;"></div>
        <div class="relative z-10 max-w-2xl mx-auto px-2 reveal">
            <span class="section-label block mb-4 md:mb-5">Vamos trabalhar juntos</span>
            <h2 class="font-display font-bold text-2xl sm:text-3xl md:text-4xl text-ink-50 mb-4 md:mb-5">Pronto para transformar a tua empresa?</h2>
            <p class="text-ink-300 text-base sm:text-lg mb-8 md:mb-10">Fala connosco e descobre como a JIMAS pode posicionar o teu negócio como referência no mercado.</p>
            <a href="{{ $whatsappUrl }}" target="_blank" class="wa-btn inline-flex items-center justify-center gap-2 sm:gap-3 px-6 sm:px-8 py-3 sm:py-4 rounded-full text-white font-semibold text-base sm:text-lg shadow-lg hover:shadow-xl transition-all duration-200 hover:-translate-y-0.5">
                <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z" />
                    <path d="M12 0C5.373 0 0 5.373 0 12c0 2.124.558 4.118 1.532 5.845L0 24l6.332-1.51A11.94 11.94 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.818a9.804 9.804 0 01-5.003-1.367l-.36-.214-3.755.896.929-3.654-.234-.376A9.78 9.78 0 012.182 12c0-5.418 4.4-9.818 9.818-9.818 5.418 0 9.818 4.4 9.818 9.818 0 5.418-4.4 9.818-9.818 9.818z" />
                </svg>
                Falar no WhatsApp
            </a>
        </div>
    </section>
@endsection
