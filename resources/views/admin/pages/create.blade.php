@extends('layouts.admin')

@section('title', 'Nova página')

@section('content')
    <div class="flex items-center justify-between mb-8">
        <h1 class="font-display font-bold text-3xl text-ink-50">Nova página</h1>
        <a href="{{ route('admin.pages.index') }}" class="text-ink-500 hover:text-ink-50 transition-colors">← Voltar</a>
    </div>

    @include('admin.pages.form', ['page' => null, 'route' => route('admin.pages.store'), 'method' => 'POST'])
@endsection
