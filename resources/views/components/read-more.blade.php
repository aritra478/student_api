<div x-data="{ showMore: false }">
    <div class="{{ $attributes->get('class') }}">
        <p x-show="showMore" x-transition:enter="transition duration-300 ease-in"
            x-transition:enter-start="opacity-0 transform -translate-y-full"
            x-transition:enter-end="opacity-100 transform translate-y-0">
            {!! $content !!}
        </p>
        <p x-show="!showMore" x-transition:enter="transition duration-300 ease-in"
            x-transition:enter-start="opacity-0 transform -translate-y-full"
            x-transition:enter-end="opacity-100 transform translate-y-0">
            {!! $limited_content !!}
        </p>
    </div>
    @if ($show_read_more)
        <button @click.prevent="showMore = !showMore" class="text-xs text-blue-500 hover:underline">
            <span x-show="!showMore">Read More</span>
            <span x-show="showMore">Show Less</span>
        </button>
    @endif
</div>
