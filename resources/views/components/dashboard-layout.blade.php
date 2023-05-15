<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Coronatime</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')

    <style>
        .icon-input {
            background: url('../images/search-icon.svg') no-repeat center left;
            background-position: 24.67px;
            padding-left: 60px;
        }
    </style>

</head>

<body class="{{ app()->getLocale() == 'en' ? 'font-inter' : '' }}  md:px-28 h-full">

    <header class="pt-5 w-full flex justify-between px-4">
        <img src="{{ URL::asset('images/coronatime.png') }}" alt="">
        <div class="flex items-center">
            @include('partials.langauge_switcher')
            <div>
                <div class="hidden md:flex md:items-center">
                    <p class="md:pl-10 font-bold leading-5 md:pr-4">{{ auth()->user()->username }}</p>
                    <x-logout-button />
                </div>
            </div>
            <div x-data="{ show: false }" class="w-16  flex items-center justify-end md:hidden relative">
                <button @click="show = !show" class="md:hidden"><img src={{ URL::asset('images/menu.png') }}
                        alt=""></button>
                <div @click="show = !show" x-show="show" class="flex flex-col items-end absolute top-6 ">
                    <p>{{ auth()->user()->username }}</p>
                    <x-logout-button />
                </div>
            </div>
        </div>
    </header>

    {{ $slot }}
</body>

</html>
