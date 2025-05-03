@props([
    'label'     => '',
    'name'      => '',
    'id'        => $name ?? uniqid(),
])

<x-form.field>
    <div class="flex items-center">
        <label for="{{ $id }}" tabindex="-1" class="relative flex items-center gap-3 select-none group">
            <div class="flex items-center gap-1">
                <span class="font-semibold">{{ $label }} </span>
                @if ($attributes->has('required'))
                <span class="font-bold text-red-700">*</span>
                @endif
            </div>

            <div class="relative flex items-center select-none group">
                <input name="{{ $name }}" id="{{ $id }}" type="checkbox" {{ $attributes }} 
                class="absolute mx-0.5 my-auto inset-y-0 checked:translate-x-4 left-0.5 w-4 h-4 rounded-full border-0 appearance-none translate-x-0 transform transition ease-in-out duration-200 cursor-pointer shadow checked:bg-none peer focus:ring-0 focus:ring-offset-0 focus:outline-none bg-white checked:text-white">
                <div class="block w-10 h-6 transition duration-100 ease-in-out bg-gray-200 rounded-full cursor-pointer peer-focus:ring-2 peer-focus:ring-offset-2 group-focus:ring-2 group-focus:ring-offset-2 peer-checked:bg-indigo-600 peer-focus:ring-indigo-600 group-focus:ring-indigo-600"></div>
            </div>
        </label>
    </div>
    <x-form.error name="{{ $name }}"/>
</x-form.field>