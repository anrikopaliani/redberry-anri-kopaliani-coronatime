@props(['label', 'name', 'placeholder'])

<div class=" py-16 flex flex-col">
    <label for="{{ $name }}" class="bold text-base">{{ $label }}</label>
    <input class="mt-2 border border-input-color px-6 py-4 w-96" type="text" id="{{ $name }}"
        name="{{ $name }}" placeholder="{{ $placeholder }}">
</div>
