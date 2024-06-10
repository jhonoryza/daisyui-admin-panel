<?php
use function Livewire\Volt\{layout, state};

state([
    'email' => '',
    'password' => '',
]);

$login = function () {
    $form = $this->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);
    if (auth()->attempt($form)) {
        return redirect()->route('dashboard');
    }
};

?>

<div class="card w-96 bg-base-100 shadow-xl">
    <div class="card-body">
        
        <!-- title -->
        <h2 class="card-title">Login</h2>
        
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

        <!-- login form -->
        <form wire:submit='login' class="py-4 space-y-2">
            <label @class([ 'input input-bordered flex items-center gap-2' , 'input-error'=> $errors->first('email')
                ])>
                <x-tabler-mail class="size-5" />
                <input type="text" class="grow" placeholder="Email" wire:model='email' />
            </label>
            <label @class([ 'input input-bordered flex items-center gap-2' , 'input-error'=> $errors->first('password')
                ])>
                <x-tabler-key class="size-5" />
                <input type="password" class="grow" placeholder="password" wire:model='password' />
            </label>
            <div class="card-actions justify-start">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>
</div>