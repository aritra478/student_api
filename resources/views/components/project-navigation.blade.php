@props(['url', 'active' => false])
@if ($active)
    <a href="{{ $url }}"
        class="flex items-center gap-3 p-3 text-indigo-700 bg-indigo-100 border-indigo-300 shadow-indigo-300 backdrop-filter backdrop-blur-sm bg-opacity-90 dark:bg-indigo-800 dark:border-indigo-800 dark:text-indigo-400">
        {{ $icon ?? '' }}
        {{ $slot }}
    </a>
@else
    <a href="{{ $url }}"
        class="flex items-center gap-3 p-3 text-green-700 bg-green-100 border-green-300 shadow-green-300 backdrop-filter backdrop-blur-sm bg-opacity-90 dark:bg-gray-800 dark:border-green-800 dark:text-green-400">
        {{ $icon ?? '' }}
        {{ $slot }}
    </a>
@endif
