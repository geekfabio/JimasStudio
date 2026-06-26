@extends('layouts.admin')

@section('title', 'Portfólio')

@section('content')
    <div class="flex items-center justify-between mb-8">
        <h1 class="font-display font-bold text-3xl text-ink-50">Portfólio</h1>
        <a href="{{ route('admin.portfolio.create') }}" class="px-5 py-2.5 rounded-lg bg-gold-300 hover:bg-gold-200 text-ink-50 font-semibold transition-colors">Novo item</a>
    </div>

    <div class="bg-white border border-ink-200 rounded-xl overflow-hidden">
        <table class="w-full text-left text-sm">
            <thead class="bg-white/50 text-ink-500">
                <tr>
                    <th class="px-6 py-3 font-medium">Título</th>
                    <th class="px-6 py-3 font-medium">Cliente</th>
                    <th class="px-6 py-3 font-medium">Categoria</th>
                    <th class="px-6 py-3 font-medium">Estado</th>
                    <th class="px-6 py-3 font-medium text-right">Acções</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-ink-200">
                @forelse ($items as $item)
                    <tr>
                        <td class="px-6 py-4 text-ink-50">{{ $item->title }}</td>
                        <td class="px-6 py-4 text-ink-500">{{ $item->client ?? '-' }}</td>
                        <td class="px-6 py-4 text-ink-500">{{ $item->category ?? '-' }}</td>
                        <td class="px-6 py-4">
                            @if ($item->is_published)
                                <span class="px-2 py-1 rounded-full text-xs bg-green-100 text-green-700 border border-green-200">Publicado</span>
                            @else
                                <span class="px-2 py-1 rounded-full text-xs bg-yellow-100 text-yellow-700 border border-yellow-200">Rascunho</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <a href="{{ route('admin.portfolio.edit', $item) }}" class="text-gold-300 hover:underline">Editar</a>
                            <form method="POST" action="{{ route('admin.portfolio.destroy', $item) }}" class="inline" onsubmit="return confirm('Eliminar este item?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-ink-500">Nenhum item registado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">{{ $items->links() }}</div>
@endsection
