@props([
    'name' => 'name',
    'count' => '12345',
    'link' => '#',
    'textColor' => 'text-gray-800',
    'linkColor' => 'text-gray-50',
    'iconColor' => 'text-gray-700',
    'bodyBg' => 'bg-gray-50',
    'footerBg' => 'bg-slate-400'
])

<div {{ $attributes->merge(['class' => "grid grid-cols-1 grid-rows-4 rounded-lg group overflow-hidden transition duration-300 ease-in-out hover:scale-95 text-slate-800 {$textColor}"]) }}>
    <div class="grid grid-cols-3 row-span-3 border rounded-t-lg border-slate-300 dark:border-gray-700 bg-slate-200 {{ $bodyBg }} dark:bg-gray-700">
        <div class="mx-0 col-span-2 flex flex-col px-4 sm:px-0 sm:pl-4  justify-center">
            <div class="mx-0 text-left {{ $iconColor }} text-2xl font-bold dark:text-white">
                {{ $count }}
            </div>
            <div class="mx-0 text-left text-sm pl-0.5 break-words capitalize font-medium dark:text-white">
                {{ $name }}
            </div>
        </div>
        <div class="flex justify-end pr-4 items-center {{ $iconColor }} transition duration-300 ease-in-out group-hover:scale-105">
            {{ $icon }}
        </div>
    </div>
    <a class="flex items-center justify-center py-2 text-xs font-semibold rounded-b-lg uppercase hover:underline dark:bg-gray-800 {{ $footerBg }} bg-opacity-75 {{ $linkColor }}" href="{{ $link }}">
        <span class='mr-1'>View More</span>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
            <path fill-rule="evenodd" d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
            <path fill-rule="evenodd" d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
        </svg>
    </a>
</div>
