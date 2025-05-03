<div x-data="{
    open: false,
    get isOpen() { return this.open },
    toggle() { this.open = !this.open },
    close() { this.open = false },

    options: @js($options),
    selectedOptions: [],

    select(option) {
        option.isSelected = !option.isSelected;
        this.setSelectedOptions();
    },
    unSelect(option) {
        option.isSelected = false;
        this.setSelectedOptions()
    },
    setSelectedOptions() { this.selectedOptions = this.options.filter((option) => option.isSelected) },
    clear() {
        this.options.forEach(option => { option.isSelected = false });
        this.setSelectedOptions();
    },

    getFocusables() {
        return Array.from(this.$root.querySelectorAll(`div[tabindex='-1']`)).filter(function(t) {
            return !t.hasAttribute('disabled');
        });
    },
    getFirstFocusable() {
        return this.getFocusables().shift();
    },
    getLastFocusable() {
        return this.getFocusables().pop();
    },
    getNextFocusable() {
        return (this.getFocusables()[this.getNextFocusableIndex()] || this.getFirstFocusable());
    },
    getPrevFocusable() {
        return (this.getFocusables()[this.getPrevFocusableIndex()] || this.getLastFocusable());
    },
    getNextFocusableIndex() {
        return document.activeElement instanceof HTMLElement ? (this.getFocusables().indexOf(document.activeElement) + 1) % (this.getFocusables().length + 1) : 0;
    },
    getPrevFocusableIndex() {
        return document.activeElement instanceof HTMLElement ? Math.max(0, this.getFocusables().indexOf(document.activeElement)) - 1 : 0;
    },
}" x-init="options.forEach(option => @js($selectedOptions).includes(option.{{ $valueKey }}) && select(option))" class="relative">
    <style>
        .hide-scrollbar::-webkit-scrollbar {
            display: none
        }

        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none
        }

        .soft-scrollbar::-webkit-scrollbar {
            cursor: pointer;
            height: 4px;
            width: 4px
        }

        .soft-scrollbar::-webkit-scrollbar-track {
            background-color: #e2e8f0;
            cursor: pointer
        }

        .soft-scrollbar::-webkit-scrollbar-thumb {
            background-color: #94a3b8;
            cursor: pointer
        }
    </style>

    <x-form.field>
        @if ($attributes->has('required'))
            <div class="flex items-center gap-1">
                <x-form.label name="{{ $name }}" label="{{ $label }}"
                    x-on:click="$refs.input.focus(); open = true;" />
                <span class="font-bold text-red-700">*</span>
            </div>
        @else
            <x-form.label name="{{ $name }}" label="{{ $label }}"
                x-on:click="$refs.input.focus(); open = true;" />
        @endif

        <div x-ref="input"
            class="relative inset-y-0 flex items-center w-full h-10 gap-2 p-2 pl-3 overflow-hidden border border-gray-300 rounded-md shadow-sm cursor-pointer focus:border-indigo-300 focus:outline-none focus:ring focus:ring-indigo-200 focus:ring-opacity-50 pr-14"
            tabindex="-1" x-on:keydown.enter.stop.prevent="toggle" x-on:keydown.space.stop.prevent="toggle"
            x-on:keydown.arrow-down.prevent="$event.shiftKey || getNextFocusable().focus()"
            x-on:keydown.arrow-up.prevent="getPrevFocusable().focus()">

            <div class="absolute inset-y-0 left-0 flex items-center w-full pl-3 overflow-hidden pr-14"
                x-on:click="toggle">
                <template x-if="!selectedOptions.length">
                    <span class="text-gray-400 capitalize truncate">{{ $placeholder }}</span>
                </template>

                <span class="inline-flex pr-2 text-sm text-gray-700 dark:text-white" x-show="selectedOptions.length"
                    x-text="selectedOptions.length" style="display: none;"></span>
                <div class="flex items-center gap-2 overflow-x-auto overscroll-contain hide-scrollbar">
                    <template x-for="(option, index) in selectedOptions" :key="`selected.${index}`">
                        <span
                            class="inline-flex items-center py-0.5 pl-2 pr-0.5 rounded-full text-xs font-medium border border-gray-200
            shadow-sm bg-gray-100 text-gray-700">
                            <span style="max-width: 5rem" class="capitalize truncate" x-text="option.name"></span>
                            <button
                                class="flex items-center justify-center w-4 h-4 text-gray-400 shrink-0 hover:text-gray-500"
                                x-on:click.stop="unSelect(option)" tabindex="-1" type="button">
                                <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </span>
                    </template>
                </div>
            </div>

            <div class="absolute inset-y-0 right-0 flex items-center pr-2 gap-x-2">
                <button x-show="selectedOptions.length" x-on:click="clear" type="button" style="display: none;">
                    <svg class="w-4 h-4 text-gray-400 hover:text-pink-400" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
                <button x-on:click="toggle" type="button">
                    <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                    </svg>
                </button>
            </div>

        </div>

        <x-form.error name="{{ $name }}" />
    </x-form.field>

    <div class="absolute inset-0 z-20 flex items-end mt-2 transition-all duration-150 ease-linear sm:z-10 sm:absolute sm:inset-auto sm:w-full"
        x-show="open" x-on:click.outside="close" x-on:keydown.escape.window="close">
        <div class="relative w-full overflow-hidden transition-all bg-white border border-gray-200 shadow-lg rounded-t-md sm:rounded-xl"
            x-show="open" x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" style="display: none;">
            <div class="overflow-y-auto select-none max-h-64 sm:max-h-60 overscroll-contain soft-scrollbar snap-y"
                x-on:keydown.tab.prevent="$event.shiftKey || getNextFocusable().focus()"
                x-on:keydown.arrow-down.prevent="$event.shiftKey || getNextFocusable().focus()"
                x-on:keydown.shift.tab.prevent="getPrevFocusable().focus()"
                x-on:keydown.arrow-up.prevent="getPrevFocusable().focus()">

                <template x-for="(option, index) in options">
                    <div class="relative flex items-center justify-between px-3 py-2 text-gray-600 duration-150 ease-in-out cursor-pointer snap-start focus:outline-none all-colors group focus:bg-indigo-100 focus:text-indigo-800 hover:text-white hover:bg-indigo-500"
                        :class="{
                            'font-semibold': option.isSelected,
                            'hover:bg-pink-500': option.isSelected,
                            'hover:bg-indigo-500': !option.isSelected
                        }"
                        x-on:click="select(option)" x-on:keydown.enter="select(option)" tabindex="-1"
                        :index="index">

                        <span x-text="option.name"></span>

                        <template x-if="option.isSelected">
                            <span class="flex-shrink-0">
                                <svg class="w-5 h-5 text-indigo-600 group-hover:text-white"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                        </template>
                    </div>
                </template>

            </div>
        </div>
    </div>

    <div class="sr-only">
        <template x-for="(option, index) in selectedOptions" :key="index">
            <input type="text" name="{{ $name }}[]" x-model="option.{{ $valueKey }}" />
        </template>
    </div>

</div>
