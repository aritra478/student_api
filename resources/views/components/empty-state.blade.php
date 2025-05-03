@props(['message'])

<div class="flex mt-4 items-center justify-center text-gray-700 dark:text-gray-200">
    <div
        class="flex flex-col items-center justify-center rounded sm:w-full md:w-96 md:h-48 py-16 text-center opacity-50 md:border-dashed md:border-2 md:border-gray-400">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
        </svg>
        <h2>{{ $message }}</h2>
    </div>
</div>
