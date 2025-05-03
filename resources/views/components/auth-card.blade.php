@props([
    'maxWidth' => 'md',
])

@php
    $maxWidth = [
        'sm' => 'sm:max-w-sm',
        'md' => 'sm:max-w-md',
        'lg' => 'sm:max-w-lg',
        'xl' => 'sm:max-w-xl',
        '2xl' => 'sm:max-w-2xl',
    ][$maxWidth];
@endphp

<div class="flex flex-col items-center min-h-screen py-6 bg-gray-100 sm:justify-center">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full px-6 py-4 mt-6 overflow-hidden bg-white shadow-md {{ $maxWidth }} sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
