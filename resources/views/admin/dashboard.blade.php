@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <header class="mb-10">
        <h1 class="font-display font-bold text-3xl md:text-4xl text-ink-50 mb-2">Dashboard</h1>
        <p class="text-ink-400">Visão geral do site JIMAS em tempo real.</p>
    </header>

    <!-- KPI Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-6 mb-10">
        <a href="{{ route('admin.services.index') }}" class="cursor-pointer group bg-white rounded-2xl p-6 border border-ink-200 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-200">
            <div class="flex items-start justify-between mb-4">
                <div class="w-11 h-11 rounded-xl bg-gold-300/10 text-gold-300 flex items-center justify-center group-hover:bg-gold-300 group-hover:text-white transition-colors duration-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                </div>
                <span class="text-xs font-semibold text-ink-400 uppercase tracking-wider">Serviços</span>
            </div>
            <p class="text-3xl font-bold text-ink-50">{{ $servicesCount }}</p>
            <p class="text-sm text-ink-400 mt-1">categorias registadas</p>
        </a>

        <a href="{{ route('admin.news.index') }}" class="cursor-pointer group bg-white rounded-2xl p-6 border border-ink-200 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-200">
            <div class="flex items-start justify-between mb-4">
                <div class="w-11 h-11 rounded-xl bg-gold-300/10 text-gold-300 flex items-center justify-center group-hover:bg-gold-300 group-hover:text-white transition-colors duration-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                </div>
                <span class="text-xs font-semibold text-ink-400 uppercase tracking-wider">Notícias</span>
            </div>
            <p class="text-3xl font-bold text-ink-50">{{ $newsCount }}</p>
            <p class="text-sm text-ink-400 mt-1">artigos publicados</p>
        </a>

        <a href="{{ route('admin.portfolio.index') }}" class="cursor-pointer group bg-white rounded-2xl p-6 border border-ink-200 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-200">
            <div class="flex items-start justify-between mb-4">
                <div class="w-11 h-11 rounded-xl bg-gold-300/10 text-gold-300 flex items-center justify-center group-hover:bg-gold-300 group-hover:text-white transition-colors duration-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </div>
                <span class="text-xs font-semibold text-ink-400 uppercase tracking-wider">Portfólio</span>
            </div>
            <p class="text-3xl font-bold text-ink-50">{{ $portfolioCount }}</p>
            <p class="text-sm text-ink-400 mt-1">projectos em destaque</p>
        </a>

        <a href="{{ route('admin.contacts.index') }}" class="cursor-pointer group bg-white rounded-2xl p-6 border border-ink-200 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-200">
            <div class="flex items-start justify-between mb-4">
                <div class="w-11 h-11 rounded-xl bg-gold-300/10 text-gold-300 flex items-center justify-center group-hover:bg-gold-300 group-hover:text-white transition-colors duration-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </div>
                <span class="text-xs font-semibold text-ink-400 uppercase tracking-wider">Mensagens</span>
            </div>
            <p class="text-3xl font-bold text-ink-50">{{ $contactsCount }}</p>
            <p class="text-sm text-ink-400 mt-1">contactos recebidos</p>
        </a>

        <a href="{{ route('admin.pages.index') }}" class="cursor-pointer group bg-white rounded-2xl p-6 border border-ink-200 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-200">
            <div class="flex items-start justify-between mb-4">
                <div class="w-11 h-11 rounded-xl bg-gold-300/10 text-gold-300 flex items-center justify-center group-hover:bg-gold-300 group-hover:text-white transition-colors duration-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                </div>
                <span class="text-xs font-semibold text-ink-400 uppercase tracking-wider">Páginas</span>
            </div>
            <p class="text-3xl font-bold text-ink-50">{{ $pagesCount }}</p>
            <p class="text-sm text-ink-400 mt-1">páginas institucionais</p>
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Ações Rápidas -->
        <section class="lg:col-span-2 bg-white rounded-2xl border border-ink-200 shadow-sm p-6 md:p-8">
            <div class="flex items-center justify-between mb-6">
                <h2 class="font-display font-bold text-xl text-ink-50">Ações rápidas</h2>
                <span class="text-xs font-semibold text-ink-400 uppercase tracking-wider">Gestão de conteúdo</span>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <a href="{{ route('admin.settings.edit') }}" class="cursor-pointer flex items-center gap-4 p-4 rounded-xl border border-ink-200 hover:border-gold-300 hover:shadow-md transition-all duration-200 group">
                    <div class="w-10 h-10 rounded-lg bg-ink-800 text-ink-400 flex items-center justify-center group-hover:bg-gold-300 group-hover:text-white transition-colors duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </div>
                    <div>
                        <p class="font-semibold text-ink-50 group-hover:text-gold-300 transition-colors duration-200">Configurações</p>
                        <p class="text-sm text-ink-400">Dados gerais do site</p>
                    </div>
                </a>

                <a href="{{ route('admin.news.create') }}" class="cursor-pointer flex items-center gap-4 p-4 rounded-xl border border-ink-200 hover:border-gold-300 hover:shadow-md transition-all duration-200 group">
                    <div class="w-10 h-10 rounded-lg bg-ink-800 text-ink-400 flex items-center justify-center group-hover:bg-gold-300 group-hover:text-white transition-colors duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                    </div>
                    <div>
                        <p class="font-semibold text-ink-50 group-hover:text-gold-300 transition-colors duration-200">Nova notícia</p>
                        <p class="text-sm text-ink-400">Publicar artigo</p>
                    </div>
                </a>

                <a href="{{ route('admin.portfolio.create') }}" class="cursor-pointer flex items-center gap-4 p-4 rounded-xl border border-ink-200 hover:border-gold-300 hover:shadow-md transition-all duration-200 group">
                    <div class="w-10 h-10 rounded-lg bg-ink-800 text-ink-400 flex items-center justify-center group-hover:bg-gold-300 group-hover:text-white transition-colors duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                    </div>
                    <div>
                        <p class="font-semibold text-ink-50 group-hover:text-gold-300 transition-colors duration-200">Novo portfólio</p>
                        <p class="text-sm text-ink-400">Adicionar projecto</p>
                    </div>
                </a>

                <a href="{{ route('admin.pages.create') }}" class="cursor-pointer flex items-center gap-4 p-4 rounded-xl border border-ink-200 hover:border-gold-300 hover:shadow-md transition-all duration-200 group">
                    <div class="w-10 h-10 rounded-lg bg-ink-800 text-ink-400 flex items-center justify-center group-hover:bg-gold-300 group-hover:text-white transition-colors duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                    </div>
                    <div>
                        <p class="font-semibold text-ink-50 group-hover:text-gold-300 transition-colors duration-200">Nova página</p>
                        <p class="text-sm text-ink-400">Criar página institucional</p>
                    </div>
                </a>
            </div>
        </section>

        <!-- Resumo do Site -->
        <section class="bg-white rounded-2xl border border-ink-200 shadow-sm p-6 md:p-8">
            <h2 class="font-display font-bold text-xl text-ink-50 mb-6">Resumo</h2>
            <ul class="space-y-4">
                <li class="flex items-center justify-between py-3 border-b border-ink-100">
                    <span class="text-ink-400">Total de conteúdos</span>
                    <span class="font-bold text-ink-50">{{ $servicesCount + $newsCount + $portfolioCount + $pagesCount }}</span>
                </li>
                <li class="flex items-center justify-between py-3 border-b border-ink-100">
                    <span class="text-ink-400">Mensagens recebidas</span>
                    <span class="font-bold text-ink-50">{{ $contactsCount }}</span>
                </li>
                <li class="flex items-center justify-between py-3">
                    <span class="text-ink-400">Último acesso</span>
                    <span class="font-bold text-ink-50">Agora</span>
                </li>
            </ul>
            <a href="{{ route('home') }}" target="_blank" class="cursor-pointer mt-6 w-full inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl bg-gold-300 text-white font-semibold hover:bg-gold-200 transition-colors duration-200">
                Ver site público
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
            </a>
        </section>
    </div>
@endsection
