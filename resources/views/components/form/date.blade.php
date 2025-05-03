@props([
    'lib' => 'flatpickr',
    'name' => null,
    'id' => uniqid(),
    'options' => '{}',
    'label' => null,
])


<x-form.field>

    @if ($attributes->has('required'))
        <div class="flex items-center gap-1">
            <x-form.label name="{{ $name }}" label="{{ $label }}" />
            <span class="text-red-700 font-bold">*</span>
        </div>
    @else
        <x-form.label name="{{ $name }}" label="{{ $label }}" />
    @endif

    <div class="relative" wire:ignore>
        <span class="absolute inset-y-0 right-0 flex items-center pr-2 text-gray-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
        </span>
        <input
            {{ $attributes->merge([
                'class' =>
                    'border rounded-md shadow-sm border-gray-300 focus:border-indigo-300 dark:bg-gray-700 dark:text-gray-200 dark:border-gray-700 focus:outline-none focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2 w-full',
                'name' => $name,
                'id' => $name ?: $id,
            ]) }} />

        <x-form.error name="{{ $name }}" />
    </div>

</x-form.field>

@if ($lib === 'flatpickr')
    <script>
        new Promise(function(resolve) {
            if (typeof flatpickr !== 'undefined') {
                resolve();
            } else {
                const checkflatpickr = function() {
                    if (typeof flatpickr !== 'undefined') {
                        resolve();
                    } else {
                        setTimeout(checkflatpickr, 100);
                    }
                };
                setTimeout(checkflatpickr, 100);
            }
        }).then(function() {
            flatpickr(
                document.getElementById(`{!! $name ?: $id !!}`),
                JSON.parse(`{!! $options !!}`)
            );
        });
    </script>
@else
    <script>
        new Promise(function(resolve) {
            if (typeof Pikaday !== 'undefined') {
                resolve();
            } else {
                const checkPikaday = function() {
                    if (typeof Pikaday !== 'undefined') {
                        resolve();
                    } else {
                        setTimeout(checkPikaday, 100);
                    }
                };
                setTimeout(checkPikaday, 100);
            }
        }).then(function() {
            new Pikaday({
                field: document.getElementById(`{!! $name ?: $id !!}`),
                ...JSON.parse(`{!! $options !!}`),
                onSelect: function(date) {
                    document.getElementById(`{!! $name ?: $id !!}`).dispatchEvent(new Event(
                        'input', {
                            value: date.toString()
                        }));
                }
            });
        });
    </script>
@endif
