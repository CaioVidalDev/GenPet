<?php

use App\Livewire\Actions\Logout;

$logout = function (Logout $logout) {
    $logout();

    $this->redirect('/', navigate: true);
};

?>

<x-mary-nav sticky full-width>

    <x-slot:brand>
        <label for="main-drawer" class="lg:hidden mr-3">
            <x-mary-icon name="o-bars-3" class="cursor-pointer" />
        </label>

        <x-application-logo aria-hidden="true" class="w-8 h-8" />
    </x-slot:brand>

    <x-slot:actions>

        <x-mary-theme-toggle />

        <x-mary-button label="" icon="o-envelope" link="###" class="btn-ghost btn-sm" responsive />
        <x-mary-button label="" icon="o-bell" link="###" class="btn-ghost btn-sm" responsive />

        <div class="hidden lg:block">
            <x-mary-avatar />
        </div>

        <x-mary-dropdown :label="auth()->user()->name" class="btn-ghost" right>
            <x-mary-menu-item :title="__('Logout')" icon="ionicon.log-in-outline" wire:click.stop="logout"/>
        </x-mary-dropdown>
    </x-slot:actions>

</x-mary-nav>