@props([
    'expanded' => false,
    'maxWidth' => '2xl',
    'color' => 'blue',
    'rounded' => 'rounded-lg',
])

@php
    $maxWidth = [
        'sm' => 'sm:max-w-sm',
        'md' => 'sm:max-w-md',
        'lg' => 'sm:max-w-lg',
        'xl' => 'sm:max-w-xl',
        '2xl' => 'sm:max-w-2xl',
    ][$maxWidth];

    $color = [
        'gray' => 'text-white bg-gray-700 border-gray-100',
        'red' => 'text-red-700 bg-red-100 border-red-300',
        'orange' => 'text-orange-700 bg-orange-100 border-orange-300',
        'amber' => 'text-amber-700 bg-amber-100 border-amber-300',
        'yellow' => 'text-yellow-700 bg-yellow-100 border-yellow-300',
        'lime' => 'text-lime-700 bg-lime-100 border-lime-300',
        'green' => 'text-green-700 bg-green-100 border-green-300',
        'emerald' => 'text-emerald-700 bg-emerald-100 border-emerald-300',
        'teal' => 'text-teal-700 bg-teal-100 border-teal-300',
        'cyan' => 'text-cyan-700 bg-cyan-100 border-cyan-300',
        'sky' => 'text-sky-700 bg-sky-100 border-sky-300',
        'blue' => 'text-blue-700 bg-blue-100 border-blue-300',
        'indigo' => 'text-indigo-700 bg-indigo-100 border-indigo-300',
        'violet' => 'text-violet-700 bg-violet-100 border-violet-300',
        'purple' => 'text-purple-700 bg-purple-100 border-purple-300',
        'fuchsia' => 'text-fuchsia-700 bg-fuchsia-100 border-fuchsia-300',
        'pink' => 'text-pink-700 bg-pink-100 border-pink-300',
        'rose' => 'text-rose-700 bg-rose-100 border-rose-300',
    ][$color];
@endphp

<div x-data="{
    expanded: @js($expanded),
    toggle() { this.expanded = !this.expanded },
    close() { this.expanded = false },
}" {{ $attributes->merge(['class' => $rounded.' shadow border '.$color]) }}>
    <h2>
        <button type="button" x-on:click="toggle"
            class="flex items-center justify-between w-full px-3 py-3 text-lg font-bold">
            <div class="inline-flex items-center">{{ $title }}</div>
            <div class="flex justify-between">
                <div class="inline-flex items-center">{{ $sub_title }}</div>
                <span x-show="expanded" aria-hidden="true" class="ml-4" style="display: none;">−</span>
                <span x-show="!expanded" aria-hidden="true" class="ml-4">+</span>
            </div>
        </button>
    </h2>

    <div x-show="expanded" class="overflow-hidden bg-white dark:bg-gray-800 rounded-b-lg"
        x-transition:enter="transition ease-out duration-200" x-transition:leave="transition ease-in duration-75"
        style="height: auto; display: none;">
        <div class="px-3 py-4 border-t-2">
            {{ $slot }}
        </div>
    </div>
</div>
