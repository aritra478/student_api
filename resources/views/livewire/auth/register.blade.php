<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Validation\Rules\Password;

new #[Layout('components.layouts.auth')] class extends Component {
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request using JWT.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Password::min(8)->mixedCase()->letters()->numbers()->symbols()->uncompromised()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered(($user = User::create($validated))));

        $token = JWTAuth::fromUser($user);
        session(['jwt_token' => $token]);
        $this->redirectIntended(route('login', absolute: false), navigate: true);
    }
};
?>

<div class="flex flex-col gap-6">
    <x-auth-header :title="__('Create an account')" :description="__('Enter your details below to create your account')" />

    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="register" class="flex flex-col gap-6">
        <x-form.field>
            <div class="flex items-center gap-1">
                <x-form.label name="name" label="Name" />
                <span class="font-bold text-red-700">*</span>
            </div>
            <input type="text" wire:model="name" name="name" id="name" required autofocus autocomplete="name"
                placeholder="{{ __('Full name') }}"
                class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:outline-none focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            <x-form.error name="name" />
        </x-form.field>
        <x-form.field>
            <div class="flex items-center gap-1">
                <x-form.label name="email" label="Email Address" />
                <span class="font-bold text-red-700">*</span>
            </div>
            <input type="email" wire:model="email" name="email" id="email" required autocomplete="email"
                placeholder="email@example.com"
                class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:outline-none focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            <x-form.error name="email" />
        </x-form.field>
        <x-form.field>
            <div x-data="{ show: true }">
                <div class="flex items-center gap-1">
                    <x-form.label name="password" label="Password" />
                    <span class="font-bold text-red-700">*</span>
                </div>
                <div class="relative">
                    <input :type="show ? 'password' : 'text'" wire:model="password" name="password" id="password"
                        required autocomplete="off" placeholder="{{ __('Password') }}"
                        class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:outline-none focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <div class="absolute inset-y-0 inline-block items-center justify-center pr-3 text-sm leading-5" style="left: 91%; top: 25%;">
                        <svg class="h-5 text-gray-700 cursor-pointer" fill="none" @click="show = !show"
                            :class="{ 'hidden': !show, 'block': show }" xmlns="http://www.w3.org/2000/svg"
                            viewbox="0 0 576 512">
                            <path fill="currentColor"
                                d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                            </path>
                        </svg>

                        <svg class="h-5 text-gray-700 cursor-pointer" fill="none" @click="show = !show"
                            :class="{ 'block': !show, 'hidden': show }" xmlns="http://www.w3.org/2000/svg"
                            viewbox="0 0 640 512">
                            <path fill="currentColor"
                                d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                            </path>
                        </svg>
                    </div>
                </div>
                <x-form.error name="password" />
            </div>
        </x-form.field>
        <x-form.field>
            <div x-data="{ show: true }">
                <div class="flex items-center gap-1">
                    <x-form.label name="password_confirmation" label="Password" />
                    <span class="font-bold text-red-700">*</span>
                </div>
                <div class="relative">
                    <input :type="show ? 'password' : 'text'" wire:model="password_confirmation" placeholder="{{ __('Confirm Password') }}"
                        name="password_confirmation" id="password_confirmation" required autocomplete="off"
                        class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:outline-none focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <div class="absolute inset-y-0 inline-block items-center pr-3 text-sm leading-5" style="left: 91%; top: 25%;">
                        <svg class="h-5 text-gray-700 cursor-pointer" fill="none" @click="show = !show"
                            :class="{ 'hidden': !show, 'block': show }" xmlns="http://www.w3.org/2000/svg"
                            viewbox="0 0 576 512">
                            <path fill="currentColor"
                                d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                            </path>
                        </svg>

                        <svg class="h-5 text-gray-700 cursor-pointer" fill="none" @click="show = !show"
                            :class="{ 'block': !show, 'hidden': show }" xmlns="http://www.w3.org/2000/svg"
                            viewbox="0 0 640 512">
                            <path fill="currentColor"
                                d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                            </path>
                        </svg>
                    </div>
                </div>
                <x-form.error name="password_confirmation" />
            </div>
        </x-form.field>
        <!-- Password policy & submit -->
        <div class="flex items-center justify-between mt-6">
            <x-password-policy />
            <flux:button type="submit" variant="primary" class="w-full">
                {{ __('Create account') }}
            </flux:button>
        </div>
    </form>

    <!-- Footer -->
    <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-zinc-600 dark:text-zinc-400">
        {{ __('Already have an account?') }}
        <flux:link :href="route('login')" wire:navigate>{{ __('Log in') }}</flux:link>
    </div>
</div>
