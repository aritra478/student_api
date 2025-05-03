@props([
    'items' => [],
    'placeholder' => 'Select an item',
    'name',
    'disabled' => false,
    'label' => '',
])
<div x-data="{
    open: false,
    search: '',
    selectedId: @entangle($attributes->wire('model')).live, // Livewire binding
    items: {{ json_encode($items) }},
    {{-- items: @entangle($attributes->wire('items')).defer, --}}
    filteredItems() {
        if (this.search === '') {
            return this.items;
        }
        return this.items.filter(item => item.name.toLowerCase().includes(this.search.toLowerCase()));
    },
    selectItem(item) {
        this.search = item.name;
        this.selectedId = item.id;
        this.open = false;
    },
    clearSearch() {
        this.search = '';
        this.selectedId = null;
        this.open = false;
    }
}" class="relative w-full max-w-xs">

    <x-form.field>

        @if ($attributes->has('required'))
            <div class="flex items-center gap-1">
                <x-form.label name="{{ $name }}" label="{{ $label }}" />
                <span class="font-bold text-red-700">*</span>
            </div>
        @else
            <x-form.label name="{{ $name }}" label="{{ $label }}" />
        @endif

        <!-- Search Input -->
        <div class="relative">
            <input type="text" placeholder="{{ $placeholder }}" x-model="search" @click="open = !open"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                @keydown.escape="open = false" />

            <!-- Clear button (X) -->
            <button x-show="search.length > 0" @click="clearSearch()"
                class="absolute text-lg text-gray-500 transition-colors duration-200 right-2 top-2 hover:text-blue-600 focus:outline-none">
                &times;
            </button>

        </div>

        <!-- Dropdown Menu -->
        <div x-show="open" @click.away="open = false"
            class="absolute z-10 w-full mt-1 overflow-y-auto bg-white border border-gray-300 rounded-md shadow-lg max-h-60">
            <template x-for="item in filteredItems()" :key="item.id">
                <div @click="selectItem(item)"
                    class="px-4 py-2 border-b border-gray-300 cursor-pointer hover:bg-blue-100 last:border-none">
                    <span x-text="item.name"></span>
                </div>
            </template>

            <!-- No results -->
            <div x-show="filteredItems().length === 0" class="px-4 py-2 text-gray-500">
                No results found
            </div>
        </div>

        <!-- Hidden input to store selected ID -->
        <input type="hidden" name="{{ $name }}" :value="selectedId">
        <x-form.error name="{{ $name }}" />
    </x-form.field>
</div>
