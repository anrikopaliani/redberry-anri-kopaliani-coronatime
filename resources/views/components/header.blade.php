<header {{ $attributes->merge(['class' => 'flex items-center w-full']) }}>
    <img src="{{ URL::asset('images/coronatime.png') }}" class="h-" alt="coronatime logo">

    {{ $slot }}
</header>
