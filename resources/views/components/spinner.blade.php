@props([
    'width' => '10',
    'height' => '10',
])
<div class="relative w-{{ $width }} animate-spin h-{{ $height }} rounded-full bg-gradient-to-b from-[#BA42FF] to-[#00E1FF] shadow-[0_-5px_20px_0_rgba(186,66,255,0.7),0_5px_20px_0_rgba(0,225,255,0.7)] blur-[1px]">
    <div class="absolute inset-0 w-{{ $width }} rounded-full h-{{ $height }}" style="background-color: rgb(222, 215, 215); filter: blur(10px);"></div>
</div>
  