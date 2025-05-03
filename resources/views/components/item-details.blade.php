<div class="flex flex-col gap-0.5 text-sm text-justify text-gray-600">
    @foreach ($item_details as $data)
        @if ($attributes->has('show_full_content'))
            @if ($loop->last)
                <div class="text-sm text-gray-700 dark:text-white">
                    {{ $data }}
                </div>
            @else
                <div class="dark:text-gray-300">
                    {{ $data }}
                </div>
            @endif
        @else
            @if ($loop->last)
                <x-read-more :content="$data" :limit="$limit"
                    class="text-sm text-gray-700 dark:text-white" />
            @else
                <x-read-more :content="$data" :limit="$limit" class="font-bold dark:text-gray-300" />
            @endif
        @endif
    @endforeach
    @if ($attributes->has('with_notes'))
        <div class="flex flex-col gap-1" x-data="{ showNotes: true }">
            <button class="flex items-center gap-1 hover:underline dark:text-white"
                :class="{
                    'text-green-500': showNotes,
                    'text-blue-500': !showNotes
                }"
                @click="showNotes = !showNotes">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                    <path fill-rule="evenodd"
                        d="M4 2a1.5 1.5 0 0 0-1.5 1.5v9A1.5 1.5 0 0 0 4 14h8a1.5 1.5 0 0 0 1.5-1.5V6.621a1.5 1.5 0 0 0-.44-1.06L9.94 2.439A1.5 1.5 0 0 0 8.878 2H4Zm1 5.75A.75.75 0 0 1 5.75 7h4.5a.75.75 0 0 1 0 1.5h-4.5A.75.75 0 0 1 5 7.75Zm0 3a.75.75 0 0 1 .75-.75h4.5a.75.75 0 0 1 0 1.5h-4.5a.75.75 0 0 1-.75-.75Z"
                        clip-rule="evenodd" />
                </svg>
                <span class="text-sm font-semibold">Notes</span>
            </button>
            @if ($item->notes)
                <div class="flex flex-col gap-0.5 text-sm leading-normal text-gray-500 dark:text-gray-100"
                    x-show="showNotes" x-transition:enter="transition duration-300 ease-in"
                    x-transition:enter-start="opacity-0 transform -translate-y-full"
                    x-transition:enter-end="opacity-100 transform translate-y-0">
                    {!! $item->notes !!}
                </div>
            @else
                <div class="flex mb-0 text-xs leading-normal text-gray-500 dark:text-gray-100" x-show="showNotes"
                    x-transition:enter="transition duration-300 ease-in"
                    x-transition:enter-start="opacity-0 transform -translate-y-full"
                    x-transition:enter-end="opacity-100 transform translate-y-0">
                    No item notes found!
                </div>
            @endif
            <div class="flex flex-col gap-1" x-show="showNotes" x-transition:enter="transition duration-300 ease-in"
                x-transition:enter-start="opacity-0 transform -translate-y-full"
                x-transition:enter-end="opacity-100 transform translate-y-0">
                @if ($attributes->has('show_group_notes'))
                    @livewire(
                        'item-group-notes',
                        [
                            'item' => $item,
                            'show_group_notes' => true,
                        ],
                        key($item->id)
                    )
                @else
                    @livewire(
                        'item-group-notes',
                        [
                            'item' => $item,
                            'show_more_button' => $attributes->has('show_more_button') ? true : false,
                        ],
                        key($item->id)
                    )
                @endif
            </div>
        </div>
    @endif
</div>
