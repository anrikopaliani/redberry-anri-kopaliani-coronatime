<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Coronatime</title>
    @vite('resources/css/app.css')
</head>

<body class="{{ app()->getLocale() == 'en' ? 'font-inter' : '' }} h-screen">
    <div class="w-full   flex justify-between h-screen">
        <div class=" w-full px-4 md:px-44 pt-6 md:pt-10 md:pb-16">
            {{ $slot }}
        </div>

        <img class="hidden md:block h-screen" src="{{ URL::asset('images/Rectangle 1.jpg') }}" alt="">


    </div>

</body>

</html>
