<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::prefix('admin')->middleware('auth')->group(function () {
    Volt::route('/dashboard', 'admin.dashboard')->name('dashboard');
    Volt::route('/profile/edit', 'admin.profile.edit')->name('profile.edit');
    Volt::route('/profile/change-password', 'admin.profile.change-password')->name('profile.change-password');
});

Route::middleware('guest')->group(function () {
    Volt::route('/login', 'auth.login')->name('login');
});