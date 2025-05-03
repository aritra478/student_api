@props([
    'maxWidth' => 'md',
])

@php
    $maxWidth = [
        'sm' => 'max-w-sm',
        'md' => 'max-w-md',
        'lg' => 'max-w-lg',
        'xl' => 'max-w-xl',
        '2xl' => 'max-w-2xl',
        '3xl' => 'max-w-3xl',
        '4xl' => 'max-w-4xl',
        '5xl' => 'max-w-5xl',
    ][$maxWidth];
@endphp

<div class="inset-0 overflow-hidden" aria-labelledby="slide-over-title" role="dialog" aria-modal="true"
    x-data="{ show: @entangle($attributes->wire('model')).live }">
    <div class="absolute inset-0 overflow-hidden" x-show="show" style="display: none">
        <div class="fixed inset-0 z-50 transition-opacity bg-gray-500 bg-opacity-75" aria-hidden="true"></div>
        <div class="fixed inset-y-0 right-0 flex max-w-full pl-10" style="z-index: 100" x-show="show"
            x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
            x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
            x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
            x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full">
            <div class="relative w-screen {{ $maxWidth }}" x-transition:enter="ease-in-out duration-500"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                x-transition:leave="ease-in-out duration-500" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0">
                <div class="absolute top-0 left-0 flex pt-4 pr-2 -ml-8 sm:-ml-10 sm:pr-4">
                    <button type="button"
                        class="text-gray-300 rounded-md hover:text-white focus:outline-none focus:ring-2 focus:ring-white"
                        x-on:click="show = false">
                        <span class="sr-only">Close panel</span>
                        <!-- Heroicon name: outline/x -->
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="flex flex-col h-full overflow-y-scroll bg-white dark:bg-gray-600 shadow-xl main-scrollbar">
                    <div class="px-4 py-6 bg-gray-100 dark:bg-gray-600 sm:px-6 sm:py-8">
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-200"
                            id="slide-over-title-{{ uniqid() }}">
                            {{ $title }}
                        </h2>
                    </div>
                    <div class="relative flex-1 px-4 py-6 sm:py-8 sm:px-6 dark:bg-gray-800">
                        <div class="absolute inset-0 p-4 sm:px-6">
                            {{ $body }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
