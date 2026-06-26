<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Administrativo — JIMAS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex items-center justify-center bg-white px-6">
    <div class="w-full max-w-md bg-white border border-ink-200 rounded-2xl p-8 shadow-xl">
        <div class="text-center mb-8">
            <img src="{{ asset('images/logo.png') }}" alt="JIMAS" class="h-12 w-auto mx-auto mb-4" />
            <h1 class="font-display font-bold text-2xl text-ink-50">Painel Administrativo</h1>
            <p class="text-ink-500 text-sm mt-2">Introduza as suas credenciais para continuar.</p>
        </div>

        <form method="POST" action="{{ route('admin.login') }}" class="space-y-5">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium text-ink-500 mb-1">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                    class="w-full px-4 py-2 rounded-lg bg-white border border-ink-200 text-ink-50 focus:border-gold-300 focus:ring-1 focus:ring-gold-300 outline-none" />
                @error('email')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-ink-500 mb-1">Palavra-passe</label>
                <input type="password" id="password" name="password" required
                    class="w-full px-4 py-2 rounded-lg bg-white border border-ink-200 text-ink-50 focus:border-gold-300 focus:ring-1 focus:ring-gold-300 outline-none" />
            </div>

            <div class="flex items-center gap-2">
                <input type="checkbox" id="remember" name="remember" class="w-4 h-4 rounded border-ink-200 bg-white text-gold-300" />
                <label for="remember" class="text-sm text-ink-500">Lembrar-me</label>
            </div>

            <button type="submit" class="w-full py-3 rounded-lg bg-gold-300 hover:bg-gold-200 text-ink-50 font-semibold transition-colors">
                Entrar
            </button>
        </form>
    </div>
</body>
</html>
