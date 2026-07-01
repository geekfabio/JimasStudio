@extends('layouts.app')

@section('content')
    @php
        $whatsappUrl = whatsapp_url(setting('whatsapp_message', 'Olá, gostaria de saber mais sobre os serviços da JIMAS.'));
    @endphp

    <!-- Hero -->
    <section class="relative pt-28 pb-16 sm:pt-32 sm:pb-20 md:pt-40 md:pb-28 px-4 sm:px-6 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-white via-gold-50/60 to-white"></div>
        <div class="absolute inset-0 opacity-[0.03]" style="background-image: repeating-linear-gradient(45deg, #27b3cb 0, #3B82F6 1px, transparent 0, transparent 50%); background-size: 24px 24px;"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[400px] h-[400px] md:w-[700px] md:h-[700px] rounded-full opacity-[0.08]" style="background: radial-gradient(circle, #25B6CD 0%, transparent 70%);"></div>

        <div class="relative z-10 max-w-4xl mx-auto text-center">
            <span class="section-label inline-block mb-5 md:mb-6 animate-fade-in-up" style="animation-delay: 0.1s;">Contactos</span>
            <h1 class="hero-title font-display font-extrabold text-ink-50 mb-5 md:mb-8 animate-fade-in-up" style="animation-delay: 0.2s;">
                Vamos conversar sobre o teu próximo <span class="gold-text">projecto</span>.
            </h1>
            <p class="text-ink-300 text-base sm:text-lg md:text-xl lg:text-2xl max-w-2xl mx-auto leading-relaxed animate-fade-in-up" style="animation-delay: 0.3s;">
                Estamos prontos para ajudar a tua empresa a crescer. Entra em contacto connosco e responderemos em breve.
            </p>
        </div>
    </section>

    <div class="gold-divider max-w-7xl mx-auto"></div>

    <!-- Contacto -->
    <section class="py-16 sm:py-20 md:py-28 px-4 sm:px-6">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-20 items-start">
                <!-- Formulário -->
                <div class="bg-white rounded-3xl p-6 sm:p-8 md:p-10 lg:p-12 shadow-xl border border-ink-700/10 order-2 lg:order-1 hover:shadow-2xl transition-shadow duration-300 reveal">
                    <div class="mb-8">
                        <h2 class="font-display font-bold text-3xl text-ink-50 mb-3">Envia-nos uma mensagem</h2>
                        <p class="text-ink-400">Preenche o formulário abaixo e entraremos em contacto brevemente.</p>
                    </div>

                    @if (session('success'))
                        <div class="mb-6 px-4 py-3 rounded-xl bg-green-500/10 border border-green-500/30 text-green-600 text-sm">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('contact.store') }}" class="space-y-5">
                        @csrf

                        <div>
                            <label for="name" class="block text-sm font-medium text-ink-300 mb-1.5">Nome</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required
                                class="w-full px-4 py-3.5 rounded-xl bg-white border border-ink-700/20 text-ink-50 placeholder-ink-500 focus:border-gold-300 focus:ring-4 focus:ring-gold-300/20 outline-none transition-all duration-200" />
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label for="email" class="block text-sm font-medium text-ink-300 mb-1.5">Email</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                                    class="w-full px-4 py-3.5 rounded-xl bg-white border border-ink-700/20 text-ink-50 placeholder-ink-500 focus:border-gold-300 focus:ring-4 focus:ring-gold-300/20 outline-none transition-all duration-200" />
                            </div>
                            <div>
                                <label for="phone" class="block text-sm font-medium text-ink-300 mb-1.5">Telefone</label>
                                <input type="text" id="phone" name="phone" value="{{ old('phone') }}"
                                    class="w-full px-4 py-3.5 rounded-xl bg-white border border-ink-700/20 text-ink-50 placeholder-ink-500 focus:border-gold-300 focus:ring-4 focus:ring-gold-300/20 outline-none transition-all duration-200" />
                            </div>
                        </div>

                        <div>
                            <label for="subject" class="block text-sm font-medium text-ink-300 mb-1.5">Assunto</label>
                            <input type="text" id="subject" name="subject" value="{{ old('subject') }}" required
                                class="w-full px-4 py-3.5 rounded-xl bg-white border border-ink-700/20 text-ink-50 placeholder-ink-500 focus:border-gold-300 focus:ring-4 focus:ring-gold-300/20 outline-none transition-all duration-200" />
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-medium text-ink-300 mb-1.5">Mensagem</label>
                            <textarea id="message" name="message" rows="5" required
                                class="w-full px-4 py-3.5 rounded-xl bg-white border border-ink-700/20 text-ink-50 placeholder-ink-500 focus:border-gold-300 focus:ring-4 focus:ring-gold-300/20 outline-none transition-all duration-200 resize-none">{{ old('message') }}</textarea>
                        </div>

                        <button type="submit" class="cursor-pointer w-full px-6 py-4 rounded-xl bg-gold-300 hover:bg-gold-200 text-white font-semibold shadow-md hover:shadow-lg hover:-translate-y-0.5 transition-all duration-200">
                            Enviar mensagem
                        </button>
                    </form>
                </div>

                <!-- Informações -->
                <div class="order-1 lg:order-2 space-y-8 reveal reveal-delay-2">
                    <div>
                        <h2 class="font-display font-bold text-2xl sm:text-3xl text-ink-50 mb-4">Informações de contacto</h2>
                        <p class="text-ink-300 text-base sm:text-lg">Podes entrar em contacto connosco através dos seguintes canais. Estamos disponíveis de segunda a sexta, das 08h às 18h.</p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 stagger-children">
                        <a href="mailto:{{ setting('site_email', 'geral@jimas.ao') }}" class="reveal cursor-pointer group bg-white rounded-2xl p-6 border border-ink-700/10 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-200">
                            <div class="w-12 h-12 rounded-xl bg-gold-300/10 text-gold-300 flex items-center justify-center mb-4 group-hover:bg-gold-300 group-hover:text-white transition-colors duration-200">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </div>
                            <h3 class="font-display font-bold text-lg text-ink-50 mb-1">Email</h3>
                            <p class="text-ink-400 text-sm">{{ setting('site_email', 'geral@jimas.ao') }}</p>
                        </a>

                        <a href="tel:{{ preg_replace('/[^\d+]/', '', setting('site_phone', '+244972465386')) }}" class="reveal cursor-pointer group bg-white rounded-2xl p-6 border border-ink-700/10 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-200">
                            <div class="w-12 h-12 rounded-xl bg-gold-300/10 text-gold-300 flex items-center justify-center mb-4 group-hover:bg-gold-300 group-hover:text-white transition-colors duration-200">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            </div>
                            <h3 class="font-display font-bold text-lg text-ink-50 mb-1">Telefone</h3>
                            <p class="text-ink-400 text-sm">{{ setting('site_phone', '+244 972 465 386') }}</p>
                        </a>

                        <div class="reveal bg-white rounded-2xl p-6 border border-ink-700/10 shadow-sm sm:col-span-2">
                            <div class="w-12 h-12 rounded-xl bg-gold-300/10 text-gold-300 flex items-center justify-center mb-4">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </div>
                            <h3 class="font-display font-bold text-lg text-ink-50 mb-1">Localização</h3>
                            <p class="text-ink-400 text-sm">{{ setting('site_address', 'Kilamba, Luanda, Angola') }}</p>
                        </div>
                    </div>

                    <a href="{{ $whatsappUrl }}" target="_blank" class="cursor-pointer wa-btn inline-flex items-center justify-center gap-3 w-full px-8 py-5 rounded-full text-white font-semibold text-lg shadow-lg hover:shadow-xl transition-all duration-200 hover:-translate-y-0.5">
                        <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z" />
                            <path d="M12 0C5.373 0 0 5.373 0 12c0 2.124.558 4.118 1.532 5.845L0 24l6.332-1.51A11.94 11.94 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.818a9.804 9.804 0 01-5.003-1.367l-.36-.214-3.755.896.929-3.654-.234-.376A9.78 9.78 0 012.182 12c0-5.418 4.4-9.818 9.818-9.818 5.418 0 9.818 4.4 9.818 9.818 0 5.418-4.4 9.818-9.818 9.818z" />
                        </svg>
                        Falar no WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
