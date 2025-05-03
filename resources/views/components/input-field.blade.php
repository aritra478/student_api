@props(['label', 'model', 'type' => 'text'])

<div>
    <label class="block text-sm font-medium">{{ $label }}</label>
    <input type="{{ $type }}" wire:model.defer="{{ $model }}" class="w-full border p-2 rounded mt-1">
    @error($model) <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
</div>
