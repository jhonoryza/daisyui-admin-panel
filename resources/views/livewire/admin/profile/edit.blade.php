<?php

use function Livewire\Volt\{state};

state([
    'email' => auth()->user()->email,
    'name' => auth()->user()->name,
]);

$updateProfile = function () {
    $this->validate([
        'email' => ['required', 'email'],
        'name' => ['required', 'string'],
    ]);

    auth()
        ->user()
        ->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);
};

?>

<div class="page-wrapper">
    <div class="card bg-base-100 shadow-xl">
        <div class="card-body">

            <!-- title -->
            <div class="card-title">
                <h1>Edit Profile</h1>
            </div>

            <!-- error messages -->
            @if ($errors->any())
                <div class="text-error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- edit profile form -->
            <form wire:submit='updateProfile' class="py-4 space-y-2">

                <label class="form-control w-full max-w-xs">
                    <div class="label">
                        <span class="label-text">Name</span>
                    </div>
                    <input type="text" class="input input-bordered w-full max-w-xs" wire:model='name' />
                </label>

                <label class="form-control w-full max-w-xs">
                    <div class="label">
                        <span class="label-text">Email</span>
                    </div>
                    <input type="text" class="input input-bordered w-full max-w-xs" wire:model='email' />
                </label>

                <div class="card-actions justify-start">
                    <button class="btn btn-primary">
                        Save
                    </button>
                </div>
            </form>

            <!-- choose themes -->
            <h1>Choose themes</h1>
            <x-themes />
        
        </div>
    </div>
</div>
