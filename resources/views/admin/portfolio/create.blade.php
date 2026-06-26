@extends('layouts.admin')

@section('title', 'Novo portfólio')

@section('content')
    <div class="flex items-center justify-between mb-8">
        <h1 class="font-display font-bold text-3xl text-ink-50">Novo item de portfólio</h1>
        <a href="{{ route('admin.portfolio.index') }}" class="text-ink-500 hover:text-ink-50 transition-colors">← Voltar</a>
    </div>

    @include('admin.portfolio.form', ['portfolio' => null, 'route' => route('admin.portfolio.store'), 'method' => 'POST'])
@endsection
