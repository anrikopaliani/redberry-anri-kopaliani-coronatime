<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Coronatime</title>

    <style>
        .styled-checkbox {
            position: absolute;
            opacity: 0;
        }

        .styled-checkbox+label {
            position: relative;
            cursor: pointer;
            padding: 0;
        }

        .styled-checkbox+label:before {
            content: '';
            margin-right: 10px;
            display: inline-block;
            vertical-align: text-top;
            width: 20px;
            height: 20px;
            border: 1px solid #E6E6E7;
            background: white;
            border-radius: 4px;
        }


        .styled-checkbox:checked+label:before {
            background: #249E2C;
        }

        .styled-checkbox :disabled+label {
            color: #b8b8b8;
            cursor: auto;
        }

        .styled-checkbox:disabled+label:before {
            box-shadow: none;
            background: #ddd;
        }

        .styled-checkbox:checked+label:after {
            content: '';
            position: absolute;
            left: 5px;
            top: 9px;
            background: white;
            width: 2px;
            height: 2px;
            box-shadow:
                2px 0 0 white,
                4px 0 0 white,
                4px -2px 0 white,
                4px -4px 0 white,
                4px -6px 0 white,
                4px -8px 0 white;
            transform: rotate(45deg);
        }
    </style>

    @vite('resources/css/app.css')
</head>

<body class="{{ app()->getLocale() == 'en' ? 'font-inter' : '' }} overflow-y-hidden">
    <div class="w-full   flex justify-between">
        <div class="w-full px-4 md:px-44 pt-6 md:pt-10 md:pb-16">
            {{ $slot }}
        </div>

        <img class="hidden md:block h-screen" src="{{ URL::asset('images/Rectangle 1.jpg') }}" alt="">


    </div>

</body>

</html>
