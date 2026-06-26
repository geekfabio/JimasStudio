<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <x-meta :title="$metaTitle ?? null" :description="$metaDescription ?? null" :canonical="$canonical ?? null" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased">
    <x-navbar />

    <main>
        @yield('content')
    </main>

    <x-footer />
</body>

</html>
