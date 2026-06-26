@extends('layouts.admin')

@section('title', 'Mensagem')

@section('content')
    <div class="flex items-center justify-between mb-8">
        <h1 class="font-display font-bold text-3xl text-ink-50">Mensagem de {{ $contact->name }}</h1>
        <a href="{{ route('admin.contacts.index') }}" class="text-ink-500 hover:text-ink-50 transition-colors">← Voltar</a>
    </div>

    <div class="bg-white border border-ink-200 rounded-xl p-6 space-y-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <p class="text-ink-500 text-xs uppercase tracking-wider">Nome</p>
                <p class="text-ink-50 font-medium">{{ $contact->name }}</p>
            </div>
            <div>
                <p class="text-ink-500 text-xs uppercase tracking-wider">Email</p>
                <p class="text-ink-50 font-medium">{{ $contact->email }}</p>
            </div>
            <div>
                <p class="text-ink-500 text-xs uppercase tracking-wider">Telefone</p>
                <p class="text-ink-50 font-medium">{{ $contact->phone ?? '-' }}</p>
            </div>
            <div>
                <p class="text-ink-500 text-xs uppercase tracking-wider">Data</p>
                <p class="text-ink-50 font-medium">{{ $contact->created_at->format('d/m/Y H:i') }}</p>
            </div>
        </div>

        <div class="border-t border-ink-200 pt-4">
            <p class="text-ink-500 text-xs uppercase tracking-wider mb-1">Assunto</p>
            <p class="text-ink-50 font-medium text-lg">{{ $contact->subject }}</p>
        </div>

        <div class="border-t border-ink-200 pt-4">
            <p class="text-ink-500 text-xs uppercase tracking-wider mb-2">Mensagem</p>
            <div class="text-ink-500 leading-relaxed whitespace-pre-wrap">{{ $contact->message }}</div>
        </div>
    </div>

    <div class="mt-6 flex gap-3">
        <a href="mailto:{{ $contact->email }}" class="px-5 py-2.5 rounded-lg bg-gold-300 hover:bg-gold-200 text-ink-50 font-semibold transition-colors">Responder por email</a>
        <form method="POST" action="{{ route('admin.contacts.destroy', $contact) }}" onsubmit="return confirm('Eliminar esta mensagem?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-5 py-2.5 rounded-lg border border-red-500/30 text-red-600 hover:bg-red-500/10 transition-colors">Eliminar</button>
        </form>
    </div>
@endsection
