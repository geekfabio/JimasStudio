@extends('layouts.app')

@section('content')
    @php
        $whatsappUrl = whatsapp_url(setting('whatsapp_message', 'Olá, gostaria de solicitar um orçamento.'));
    @endphp

    <section class="min-h-[60vh] flex flex-col items-center justify-center relative overflow-hidden pt-32 pb-16 px-6">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?w=1920&h=1080&fit=crop&auto=format&q=80" alt="" class="w-full h-full object-cover" />
            <div class="absolute inset-0 bg-white/90"></div>
        </div>
        <div class="absolute inset-0 opacity-5" style="background-image: repeating-linear-gradient(45deg, #27b3cb 0, #3B82F6 1px, transparent 0, transparent 50%); background-size: 20px 20px;"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] rounded-full opacity-10" style="background: radial-gradient(circle, #27b3cb 0%, transparent 70%);"></div>

        <div class="relative z-10 text-center max-w-4xl mx-auto">
            <span class="section-label inline-block mb-6">Luanda, Angola · 2026</span>
            <h1 class="font-display font-extrabold leading-none tracking-tight mb-6" style="font-size: clamp(2.5rem, 8vw, 5rem); color: #0F172A;">
                Os nossos <span class="gold-text">serviços</span>
            </h1>
            <p class="text-ink-300 text-lg md:text-xl max-w-2xl mx-auto mb-10 leading-relaxed">
                Soluções completas de marketing, comunicação, produção audiovisual e salas profissionais para aluguer.
            </p>

            <div class="flex flex-wrap justify-center gap-3">
                    @foreach ($categories as $category)
                        <a href="#{{ $category->slug }}"
                            class="px-5 py-2 rounded-full border border-ink-600 text-sm text-ink-200 hover:border-gold-400 hover:text-gold-300 transition-all">
                            {{ $category->title }}
                        </a>
                    @endforeach
                </div>
        </div>
    </section>

    <div class="gold-divider max-w-7xl mx-auto"></div>

    @foreach ($categories as $category)
        <x-pricing-section :category="$category" />
    @endforeach

    <section class="py-24 px-6 text-center relative overflow-hidden">
        <div class="absolute inset-0 opacity-5" style="background-image: repeating-linear-gradient(45deg, #27b3cb 0, #3B82F6 1px, transparent 0, transparent 50%); background-size: 20px 20px;"></div>
        <div class="relative z-10 max-w-2xl mx-auto">
            <span class="section-label block mb-5">Vamos trabalhar juntos</span>
            <h2 class="font-display font-bold text-4xl md:text-5xl text-ink-50 mb-5">Solicite um orçamento</h2>
            <p class="text-ink-300 text-lg mb-10">Fale connosco pelo WhatsApp e receba uma proposta personalizada.</p>
            <a href="{{ $whatsappUrl }}" target="_blank" class="wa-btn inline-flex items-center gap-3 px-8 py-4 rounded-full text-white font-semibold text-lg shadow-lg">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z" />
                    <path d="M12 0C5.373 0 0 5.373 0 12c0 2.124.558 4.118 1.532 5.845L0 24l6.332-1.51A11.94 11.94 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.818a9.804 9.804 0 01-5.003-1.367l-.36-.214-3.755.896.929-3.654-.234-.376A9.78 9.78 0 012.182 12c0-5.418 4.4-9.818 9.818-9.818 5.418 0 9.818 4.4 9.818 9.818 0 5.418-4.4 9.818-9.818 9.818z" />
                </svg>
                Pedir orçamento no WhatsApp
            </a>
        </div>
    </section>
@endsection
