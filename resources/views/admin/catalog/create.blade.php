@extends('layouts.admin')

@section('title', 'Novo catálogo')

@section('content')
    <div class="flex items-center justify-between mb-8">
        <h1 class="font-display font-bold text-3xl text-ink-50">Novo item de catálogo</h1>
        <a href="{{ route('admin.catalog.index') }}" class="text-ink-500 hover:text-ink-50 transition-colors">← Voltar</a>
    </div>

    @include('admin.catalog.form', ['catalog' => null, 'route' => route('admin.catalog.store'), 'method' => 'POST'])
@endsection
