@props(['label', 'name', 'placeholder'])

<div class=" flex flex-col  ">
    <label for="{{ $name }}" class=" text-base font-bold">{{ $label }}</label>
    <input
        class="mt-2 w-full border border-input-color-default  rounded-lg focus:border-brand-primary focus:outline-none px-6 py-4 "
        type="text" id="{{ $name }}" name="{{ $name }}" placeholder="{{ $placeholder }}">
</div>
