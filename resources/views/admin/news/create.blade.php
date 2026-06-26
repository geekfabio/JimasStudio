@extends('layouts.admin')

@section('title', 'Nova notícia')

@section('content')
    <div class="flex items-center justify-between mb-8">
        <h1 class="font-display font-bold text-3xl text-ink-50">Nova notícia</h1>
        <a href="{{ route('admin.news.index') }}" class="text-ink-500 hover:text-ink-50 transition-colors">← Voltar</a>
    </div>

    @include('admin.news.form', ['news' => null, 'route' => route('admin.news.store'), 'method' => 'POST'])
@endsection
