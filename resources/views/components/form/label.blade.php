@props(['name', 'label' => ''])

<label class="block mb-2 uppercase font-bold text-xs dark:text-white text-gray-700" for="{{ $name }}">
    {{ empty($label) ? trim(str_replace('id', '', str_replace('_', ' ', $name))) : $label }}
</label>
