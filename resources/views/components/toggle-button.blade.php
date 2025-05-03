@props(['step', 'currentStep', 'icon', 'label'])

<button
    {{ $attributes->merge([
        'class' => 'inline-flex items-center px-4 py-2 text-sm font-medium transition-all rounded-lg',
    ]) }}
    x-bind:class="{
        'bg-gray-200 text-gray-800 border border-gray-300 hover:bg-gray-300 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 dark:hover:bg-gray-600': step !=
            {{ $step }},
        'bg-blue-600 text-white border-transparent hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600': step ==
            {{ $step }}
    }"
    x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
    <div class="flex items-center space-x-2">
        <!-- Show icon only for medium and larger screens -->
        <span class="hidden md:inline">
            {{ $icon }}
        </span>
        <!-- Label adjusts for small screens -->
        <span class="text-xs md:text-sm">
            {{ $label }}
        </span>
    </div>
</button>
