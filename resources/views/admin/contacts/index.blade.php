@extends('layouts.admin')

@section('title', 'Mensagens de contacto')

@section('content')
    <div class="flex items-center justify-between mb-8">
        <h1 class="font-display font-bold text-3xl text-ink-50">Mensagens de contacto</h1>
    </div>

    <div class="bg-white border border-ink-200 rounded-xl overflow-hidden">
        <table class="w-full text-left text-sm">
            <thead class="bg-white/50 text-ink-500">
                <tr>
                    <th class="px-6 py-3 font-medium">Nome</th>
                    <th class="px-6 py-3 font-medium">Assunto</th>
                    <th class="px-6 py-3 font-medium">Estado</th>
                    <th class="px-6 py-3 font-medium">Data</th>
                    <th class="px-6 py-3 font-medium text-right">Acções</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-ink-200">
                @forelse ($contacts as $contact)
                    <tr class="{{ $contact->is_read ? 'opacity-70' : '' }}">
                        <td class="px-6 py-4 text-ink-50">
                            {{ $contact->name }}
                            <div class="text-ink-500 text-xs">{{ $contact->email }}</div>
                        </td>
                        <td class="px-6 py-4 text-ink-500">{{ $contact->subject }}</td>
                        <td class="px-6 py-4">
                            @if ($contact->is_read)
                                <span class="px-2 py-1 rounded-full text-xs bg-ink-800 text-ink-400">Lida</span>
                            @else
                                <span class="px-2 py-1 rounded-full text-xs bg-gold-300/10 text-gold-300 border border-gold-300/30">Nova</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-ink-500">{{ $contact->created_at->format('d/m/Y H:i') }}</td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <a href="{{ route('admin.contacts.show', $contact) }}" class="text-gold-300 hover:underline">Ver</a>
                            <form method="POST" action="{{ route('admin.contacts.destroy', $contact) }}" class="inline" onsubmit="return confirm('Eliminar esta mensagem?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-ink-500">Nenhuma mensagem recebida.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">{{ $contacts->links() }}</div>
@endsection
