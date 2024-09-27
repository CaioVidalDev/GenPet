<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link
        href="https://fonts.bunny.net/css?family=montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />

    <link rel="shortcut icon" sizes="114x114" href="{{ Vite::asset('resources/images/logo.svg') }}">

    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans">

    <div class="bg-zinc-700 flex items-center justify-center h-screen w-screen">
        
        <div>
            <p class="text-white">Genpet</p>

            <x-mary-button label="Entrar" link="{{ route('login') }}" class="btn-primary" />
        </div>

    </div>
    
    @livewireScripts
</body>

</html>
