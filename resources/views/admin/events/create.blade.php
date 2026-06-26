@extends('layouts.admin')

@section('title', 'Novo evento')

@section('content')
    <div class="flex items-center justify-between mb-8">
        <h1 class="font-display font-bold text-3xl text-ink-50">Novo evento</h1>
        <a href="{{ route('admin.events.index') }}" class="text-ink-500 hover:text-ink-50 transition-colors">← Voltar</a>
    </div>

    @include('admin.events.form', ['event' => null, 'route' => route('admin.events.store'), 'method' => 'POST'])
@endsection
