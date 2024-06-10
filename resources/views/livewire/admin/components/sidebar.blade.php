<?php

use function Livewire\Volt\{state};

$logout = function(){
    auth()->logout();
    return redirect()->route('login');
};

?>

<ul class="menu bg-base-100 p-4 w-80 min-h-full text-base-content border-r-2 border-base-300">
    <li>
        <h2 class="menu-title">Dashboard</h2>
        <ul>
            <li>
                <a wire:navigate href="{{ route('dashboard') }}" @class(['active' => request()->routeIs('dashboard')])>
                    <x-tabler-home class="size-5" />
                    <span>Dashboard</span>
                </a>
            </li>
        </ul>
    </li>
    <li>
        <h2 class="menu-title">Profile</h2>
        <ul>
            <li>
                <a wire:navigate href="{{ route('profile.edit') }}" @class(['active' => request()->routeIs('profile.edit')])>
                    <x-tabler-user class="size-5" />
                    <span>Edit Profile</span>
                </a>
            </li>
            <li>
                <a wire:navigate href="{{ route('profile.change-password') }}" @class(['active' => request()->routeIs('profile.change-password')])>
                    <x-tabler-lock class="size-5" />
                    <span>Change Password</span>
                </a>
            </li>
            <li>
                <a wire:click="logout()" wire:confirm='are you sure want to logout ?'>
                    <x-tabler-power class="size-5" />
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </li>
</ul>
