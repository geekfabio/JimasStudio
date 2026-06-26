@extends('layouts.admin')

@section('title', 'Editar página')

@section('content')
    <div class="flex items-center justify-between mb-8">
        <h1 class="font-display font-bold text-3xl text-ink-50">Editar página</h1>
        <a href="{{ route('admin.pages.index') }}" class="text-ink-500 hover:text-ink-50 transition-colors">← Voltar</a>
    </div>

    @include('admin.pages.form', ['page' => $page, 'route' => route('admin.pages.update', $page), 'method' => 'PUT'])
@endsection
