@props([
    'dark' => false,
    'color' => 'green',
    'collapsable' => false,
])
<div class="items-center flex-1 mb-4 rounded " x-data="{ open: false }">
    <div
        class="rounded shadow-sm dark:border-gray-700 shadow-{{ $color }}-500 border border-{{ $color }}-300">
        <div
            class="{{ $dark ? 'bg-gray-800' : 'bg-white' }} py-3 dark:bg-gray-700 px-4 flex justify-between items-center rounded">
            <h2
                class="inline-flex font-bold {{ $dark ? 'text-white' : 'text-' . $color . '-600' }} dark:text-gray-200 uppercase">
                {{ $title }}
            </h2>
            <div
                class="flex dark:text-gray-200 items-center gap-2 {{ $dark ? 'text-white' : 'text-' . $color . '-600' }}">
                {{ $icon ?? '' }}
                <button type="button" @click="open = !open" x-show="!open">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                    </svg>
                </button>
                <button type="button" @click="open = !open" x-show="open">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                    </svg>
                </button>
            </div>
        </div>
        <div class="flex items-center justify-start px-4 py-3 bg-white border-t border-gray-300 rounded dark:bg-gray-700 dark:border-gray-700"
            x-show="open" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-90" style="display:none">
            {{ $body }}
        </div>
    </div>
</div>
