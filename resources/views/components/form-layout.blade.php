<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Coronatime</title>

    @vite('resources/css/app.css')
</head>

<body>
    <div class="w-full  flex justify-between">
        <div>
            {{ $slot }}
        </div>

        <img class=" h-screen" src="{{ URL::asset('images/Rectangle 1.jpg') }}" alt="">

    </div>

</body>

</html>
