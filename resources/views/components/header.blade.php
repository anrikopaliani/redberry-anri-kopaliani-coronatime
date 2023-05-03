<header {{ $attributes->merge(['class' => 'flex items-center w-full  h-1/6']) }}>
    <img src="{{ URL::asset('images/coronatime.png') }}" alt="coronatime logo">

    {{ $slot }}
</header>
