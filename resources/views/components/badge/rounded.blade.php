@props([
    'icon' => '',
    'color' => 'violet',
    'rounded' => 'md',
])
@php
    $color = [
        'gray' => 'text-gray-700 bg-gray-100 border-gray-300',
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
    $rounded = [
        'sm' => 'rounded-sm',
        'md' => 'rounded-md',
        'full' => 'rounded-full',
    ][$rounded];
@endphp

<span
    class="flex justify-center items-center gap-1 flex-wrap {{ $color }} text-xs border font-semibold py-0.5 px-2 {{ $rounded }} break-words">
    {{ $icon }}

    {{ $slot }}
</span>
