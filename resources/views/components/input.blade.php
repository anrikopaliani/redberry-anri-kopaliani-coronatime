@props(['label', 'name', 'placeholder', 'type' => 'text', 'hint' => ''])

<div {{ $attributes->merge(['class' => 'flex flex-col ']) }}>
    <label for="{{ $name }}" class=" text-base font-bold pt-1">{{ $label }}</label>
    <div class="relative">
        <input
            class="mt-2 w-full @error($name) border-red-500  @enderror border border-input-color-default  rounded-lg focus:border-brand-primary focus:outline-none px-6 py-4 placeholder:text-sm"
            type="{{ $type }}" value="{{ old($name) }}" id="{{ $name }}" name="{{ $name }}"
            placeholder="{{ $placeholder }}">

        @error($name)
            <p class="text-red-500 absolute  top-70 text-xs flex items-center"><img class="pr-1" width="20"
                    height="20" src="{{ URL::asset('images/error.png') }}" alt="error">
                {{ $message }}</p>
        @else
            <p class="absolute top-70 text-sm opacity-50">{{ $hint }}</p>
        @enderror
    </div>
</div>
