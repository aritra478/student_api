@props(['label', 'model', 'type' => 'text', 'onchange' => null])

<div>
    <label class="text-xs text-gray-700">{{ $label }}</label>
    <input type="{{ $type }}" wire:model="{{ $model }}"
        {{ $onchange ? "wire:change=$onchange" : '' }}
        class="border p-2 rounded w-full">
</div>
