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
<body class="min-h-screen font-sans antialiased bg-base-200/50 dark:bg-base-200">

<body class="font-sans antialiased">

     <x-mary-main  full-width>

        <x-slot:sidebar drawer="main-drawer" collapsible class="bg-pg-primary-500 dark:bg-pg-primary-700 shadow-md text-pg-primary-50" collapse-text="Esconder">

        

           <x-mary-menu active-bg-color="bg-pg-primary-5000 dark:bg-pg-primary-6000" activate-by-route class='flex h-full gap-2 text-pg-primary-50'>


                <x-mary-menu-item :title="__('Dashboard')" icon="ri.dashboard-fill" :link="route('dashboard')" />
                <x-mary-menu-item :title="__('Agenda')" icon="ri.shield-user-fill" :link="route('eventos.index')" />
                <x-mary-menu-item :title="__('Guardiões')" icon="ri.shield-user-fill" :link="route('guardiaos.index')" />
                <x-mary-menu-item :title="__('Animais')" icon="fas.dog" :link="route('animals.index')" />
                <x-mary-menu-item :title="__('Vacinas')" icon="tabler.vaccine" :link="route('vacinas.index')" />
                <x-mary-menu-item :title="__('Tratamentos')" icon="healthicons.f-hospitalized" :link="route('tratamentos.index')" />
                <x-mary-menu-item :title="__('Serviços')" icon="ri.scissors-2-fill" :link="route('servicos.index')" />
                <x-mary-menu-item :title="__('Perfil')" icon="ri.user-fill" :link="route('profile.edit')" />

                
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-mary-menu-item icon="ri.logout-box-fill" :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-mary-menu-item>
                </form>
                
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
