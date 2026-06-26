@extends('layouts.admin')

@section('title', 'Novo plano')

@section('content')
    <div class="flex items-center justify-between mb-8">
        <h1 class="font-display font-bold text-3xl text-ink-50">Novo plano</h1>
        <a href="{{ route('admin.services.plans.index') }}" class="text-ink-500 hover:text-ink-50 transition-colors">← Voltar</a>
    </div>

    @include('admin.services.plans.form', ['plan' => null, 'route' => route('admin.services.plans.store'), 'method' => 'POST'])
@endsection
