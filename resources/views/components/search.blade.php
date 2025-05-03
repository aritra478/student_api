@props([
    'name'  =>  'search'
])

<div
    class="w-48 focus-within:w-72 pl-8 dark:text-gray-50 focus-within:pl-0 relative rounded-md overflow-hidden shadow-sm flex group transition-all duration-500 focus-within:ring-1 focus-within:ring-blue-600  focus-within:border-blue-600 border-gray-400 box-border border">
    
    <input
        {{ $attributes->merge(['type' => 'text', 'name' => $name, 'id' => $name, 'class' => 'focus:ring-0 block w-full px-2 sm:text-sm border-none dark:bg-gray-600 dark:placeholder-gray-300', 'autocomplete' => 'off']) }}>
    <div
        class="p-2 absolute left-0  group-focus-within:translate-x-[700%] transition-all duration-500 flex h-full justify-center items-center text-gray-400 group-focus-within:bg-blue-700 group-focus-within:text-white">
        <div class="flex items-center pointer-events-none ">
            <span class=" animate-spin" wire:loading>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z"
                        clip-rule="evenodd" />
                </svg>
            </span>
        </div>
        <span class=" sm:text-sm flex" wire:loading.remove>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 " viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                    clip-rule="evenodd" />
            </svg>
        </span>
    </div>
    <!-- </div> -->
</div>
