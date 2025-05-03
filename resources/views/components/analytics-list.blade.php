<div x-data="{ show_list: $persist(true) }" class="flex-1 flex-col">
    <div class="flex flex-col justify-center gap-2.5 items-center mb-4">
        <div class="flex divide-x divide-lime-500 hover:cursor-pointer rounded shadow-sm border">
            <div @click="show_list=true"
                class="px-2 py-1 font-semibold text-center select-none flex gap-1 items-center"
                :class="{
                    'bg-gray-100 text-gray-600 ': !show_list,
                    'bg-indigo-700 text-indigo-50': show_list
                }">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                    <path
                        d="M12 9a1 1 0 0 1-1-1V3c0-.552.45-1.007.997-.93a7.004 7.004 0 0 1 5.933 5.933c.078.547-.378.997-.93.997h-5Z" />
                    <path
                        d="M8.003 4.07C8.55 3.994 9 4.449 9 5v5a1 1 0 0 0 1 1h5c.552 0 1.008.45.93.997A7.001 7.001 0 0 1 2 11a7.002 7.002 0 0 1 6.003-6.93Z" />
                </svg>
                Analytics
            </div>
            <div @click="show_list=false"
                :class="{
                    'bg-gray-100 text-gray-600 ': show_list,
                    'bg-indigo-700 text-indigo-50':
                        !show_list
                }"
                class="px-2 py-1 font-semibold text-center select-none flex gap-1 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                    <path
                        d="M3 1.25a.75.75 0 0 0 0 1.5h.25v2.5a.75.75 0 0 0 1.5 0V2A.75.75 0 0 0 4 1.25H3ZM2.97 8.654a3.5 3.5 0 0 1 1.524-.12.034.034 0 0 1-.012.012L2.415 9.579A.75.75 0 0 0 2 10.25v1c0 .414.336.75.75.75h2.5a.75.75 0 0 0 0-1.5H3.927l1.225-.613c.52-.26.848-.79.848-1.371 0-.647-.429-1.327-1.193-1.451a5.03 5.03 0 0 0-2.277.155.75.75 0 0 0 .44 1.434ZM7.75 3a.75.75 0 0 0 0 1.5h9.5a.75.75 0 0 0 0-1.5h-9.5ZM7.75 9.25a.75.75 0 0 0 0 1.5h9.5a.75.75 0 0 0 0-1.5h-9.5ZM7.75 15.5a.75.75 0 0 0 0 1.5h9.5a.75.75 0 0 0 0-1.5h-9.5ZM2.625 13.875a.75.75 0 0 0 0 1.5h1.5a.125.125 0 0 1 0 .25H3.5a.75.75 0 0 0 0 1.5h.625a.125.125 0 0 1 0 .25h-1.5a.75.75 0 0 0 0 1.5h1.5a1.625 1.625 0 0 0 1.37-2.5 1.625 1.625 0 0 0-1.37-2.5h-1.5Z" />
                </svg>
                List
            </div>
        </div>
        <div x-show="show_list">
            {{ $action ?? '' }}
        </div>
    </div>

    <div style="display: none" x-show="show_list" x-transition:enter="-translate-x-0 duration-500"
    x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="translate-x-full duration-500" x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-90">
        {{ $analytics ?? '' }}
    </div>

    <div style="display: none" x-show="!show_list" x-transition:enter="-translate-x-0 duration-500"
    x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="-translate-x-full duration-500" x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-90">
        {{ $list ?? '' }}
    </div>
</div>
