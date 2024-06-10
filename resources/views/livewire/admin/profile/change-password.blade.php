<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use function Livewire\Volt\{state};

state([
    'current_password' => '',
    'password' => '',
    'password_confirmation' => '',
]);

$changePassword = function () {
    $this->validate([
        'current_password' => ['required'],
        'password' => ['required', 'string', 'min:6', 'confirmed'],
        'password_confirmation' => ['required', 'string', 'min:6'],
    ]);

    if (!Hash::check($this->current_password, auth()->user()->password)) {
        throw ValidationException::withMessages([
            'current_password' => 'Your current password does not match with the password you provided. Please try again.',
        ]);
    }

    auth()
        ->user()
        ->update([
            'password' => bcrypt($this->password),
        ]);

    $this->reset();
};

?>

<div class="page-wrapper">
    <div class="card bg-base-100 shadow-xl">
        <div class="card-body">

            <!-- title -->
            <div class="card-title">
                <h1>Change Password</h1>
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
            <form wire:submit='changePassword' class="py-4 space-y-2">

                <label class="form-control w-full max-w-xs">
                    <div class="label">
                        <span class="label-text">Current Password</span>
                    </div>
                    <input type="password" wire:model='current_password' @class([
                        'input input-bordered w-full max-w-xs',
                        'input-error' => $errors->first('current_password'),
                    ]) />
                </label>

                <label class="form-control w-full max-w-xs">
                    <div class="label">
                        <span class="label-text">New Password</span>
                    </div>
                    <input type="password" wire:model='password' @class([
                        'input input-bordered w-full max-w-xs',
                        'input-error' => $errors->first('password'),
                    ]) />
                </label>

                <label class="form-control w-full max-w-xs">
                    <div class="label">
                        <span class="label-text">New Password Confirmation</span>
                    </div>
                    <input type="password" wire:model='password_confirmation' @class([
                        'input input-bordered w-full max-w-xs',
                        'input-error' => $errors->first('password_confirmation'),
                    ]) />
                </label>

                <div class="card-actions justify-start">
                    <button class="btn btn-primary">
                        Save
                    </button>
                </div>
            </form>

        </div>
    </div>

</div>
