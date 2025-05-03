@props(['id'])

<div class="flex justify-center w-full">
    <canvas id="{{ $id }}" {{ $attributes->merge(['class' => 'flex']) }}></canvas>
</div>
