@extends('layouts.admin')

@section('title', 'Planos de serviços')

@section('content')
    <div class="flex items-center justify-between mb-8">
        <h1 class="font-display font-bold text-3xl text-ink-50">Planos de serviços</h1>
        <a href="{{ route('admin.services.plans.create') }}" class="px-5 py-2.5 rounded-lg bg-gold-300 hover:bg-gold-200 text-ink-50 font-semibold transition-colors">Novo plano</a>
    </div>

    <div class="bg-white border border-ink-200 rounded-xl overflow-hidden">
        <table class="w-full text-left text-sm">
            <thead class="bg-white/50 text-ink-500">
                <tr>
                    <th class="px-6 py-3 font-medium">Nome</th>
                    <th class="px-6 py-3 font-medium">Categoria</th>
                    <th class="px-6 py-3 font-medium">Preço</th>
                    <th class="px-6 py-3 font-medium">Estado</th>
                    <th class="px-6 py-3 font-medium text-right">Acções</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-ink-200">
                @forelse ($plans as $plan)
                    <tr>
                        <td class="px-6 py-4 text-ink-50">{{ $plan->name }}</td>
                        <td class="px-6 py-4 text-ink-500">{{ $plan->category?->title ?? '-' }}</td>
                        <td class="px-6 py-4 text-ink-500">{{ $plan->price }} {{ $plan->price_label }}</td>
                        <td class="px-6 py-4">
                            @if ($plan->is_active)
                                <span class="px-2 py-1 rounded-full text-xs bg-green-100 text-green-700 border border-green-200">Activo</span>
                            @else
                                <span class="px-2 py-1 rounded-full text-xs bg-yellow-100 text-yellow-700 border border-yellow-200">Inactivo</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <a href="{{ route('admin.plans.edit', $plan) }}" class="text-gold-300 hover:underline">Editar</a>
                            <form method="POST" action="{{ route('admin.plans.destroy', $plan) }}" class="inline" onsubmit="return confirm('Eliminar este plano?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-ink-500">Nenhum plano registado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">{{ $plans->links() }}</div>

    <div class="mt-8">
        <a href="{{ route('admin.services.index') }}" class="text-gold-300 hover:underline">← Voltar às categorias</a>
    </div>
@endsection
