<?php

use App\Livewire\Actions\Logout;

$logout = function (Logout $logout) {
    $logout();

    $this->redirect('/', navigate: true);
};

?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link
        href="https://fonts.bunny.net/css?family=montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />

    <link rel="shortcut icon" sizes="114x114" href="{{ Vite::asset('resources/images/logo.svg') }}">

    @livewireStyles

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">

  

    <x-mary-main with-nav full-width>

        <x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-200">

            <x-mary-menu active-bg-color="bg-primary" activate-by-route>
                <x-mary-menu-item :title="__('Dashboard')" icon="" :link="route('dashboard')" />
                <x-mary-menu-item :title="__('Guardiao')" icon="" :link="route('guardiaos.index')" />
                
            </x-mary-menu>
            
        </x-slot:sidebar>

        <x-slot:content>
            {{ $slot }}
        </x-slot:content>

    </x-mary-main>

    <x-mary-toast />

    @livewireScripts
</body>

</html>
