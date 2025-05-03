@props([
    'id',
    'name' => '',
    'label' => '',
    'placeholder' => '',
    'value' => '',
    'height' => '80px',
    'input_id' => uniqid(),
])

@php
    if ($attributes->has('wire:model')) {
        $wireModel = 'wire:model=' . $attributes->get('wire:model');
    } elseif ($attributes->has('wire:model.live')) {
        $wireModel = 'wire:model.live=' . $attributes->get('wire:model.live');
    } else {
        $wireModel = '';
    }
@endphp

<div class="mt-4" wire:ignore>
    @if ($attributes->has('required'))
        <div class="flex items-center gap-1">
            <x-form.label name="{{ $name }}" label="{{ $label }}" />
            <span class="font-bold text-red-700">*</span>
        </div>
    @else
        <x-form.label name="{{ $name }}" label="{{ $label }}" />
    @endif

    <div id="{{ $id }}" style="height: {{ $height }};"></div>
    <input type="hidden" id="{{ $input_id }}" {{ $wireModel }} value="{{ $value }}">

    {{-- @once --}}
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const editor = new quill('#{{ $id }}', {
                    theme: 'snow',
                    placeholder: '{{ $placeholder }}',
                    modules: {
                        toolbar: [
                            [{
                                'font': []
                            }],
                            // [{ 'size': ['small', false, 'large', 'huge'] }],
                            [{
                                'header': [1, 2, 3, false]
                            }],
                            ['bold', 'italic', 'underline', 'strike'],
                            [{
                                'script': 'sub'
                            }, {
                                'script': 'super'
                            }],
                            // ['blockquote'],
                            [{
                                'list': 'ordered'
                            }, {
                                'list': 'bullet'
                            }],
                            [{
                                'align': []
                            }],
                            [{
                                'color': []
                            }, {
                                'background': []
                            }],
                            ['link'],
                            // [{ 'direction': 'rtl' }],
                            ['clean']
                        ]
                    },
                });


                let hiddenInput = document.getElementById('{{ $input_id }}');
                if (hiddenInput.value) {
                    editor.root.innerHTML = hiddenInput.value;
                } else {
                    hiddenInput.value = editor.root.innerHTML;
                }

                editor.on('text-change', function() {
                    if (editor.root.innerHTML == "<p><br></p>") {
                        hiddenInput.value = null;
                    } else {
                        hiddenInput.value = editor.root.innerHTML;
                    }
                    hiddenInput.dispatchEvent(new Event('input'));
                });

                Livewire.on('reset-quill-{{ $id }}', () => {
                    editor.root.innerHTML = "<p><br></p>";
                });
                Livewire.on('populate-quill-{{ $id }}', (value) => {
                    editor.root.innerHTML = value || "<p><br></p>";
                });
            });
        </script>
    @endpush
    {{-- @endonce --}}
</div>
<x-form.error name="{{ $name }}" />
