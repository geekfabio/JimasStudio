@extends('layouts.admin')

@section('title', 'Nova categoria')

@section('content')
    <div class="flex items-center justify-between mb-8">
        <h1 class="font-display font-bold text-3xl text-ink-50">Nova categoria</h1>
        <a href="{{ route('admin.services.index') }}" class="text-ink-500 hover:text-ink-50 transition-colors">← Voltar</a>
    </div>

    @include('admin.services.categories.form', ['service' => null, 'route' => route('admin.services.store'), 'method' => 'POST'])
@endsection
