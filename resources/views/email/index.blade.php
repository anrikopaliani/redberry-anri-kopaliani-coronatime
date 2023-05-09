<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700;800;900&display=swap');

        .body {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            font-family: 'Inter';
        }

        .h1 {
            font-size: 25px;
        }

        .p {
            font-size: 18px;
        }

        .img {
            width: 60%;
            height: 40%;
            margin: 20px;
        }

        .button {
            background: #0FBA68;
            font-weight: bolder;
            padding: 15px 0;
            width: 60%;
            border-radius: 8px;
            border: none;
            color: white;
            text-decoration: none;
            text-align: center;
        }

        @media (max-width:700px) {

            .h1 {
                font-size: 20px;
            }

            .p {
                font-size: 16px;
            }

            .button {
                width: 100%;
            }
        }
    </style>

</head>

<body class="body">
    <img class="img" src="{{ URL::asset('images/email-image.png') }}" alt="">
    <h1 class="h1">{{ $title }}</h1>
    <p class="p">{{ $description }}</p>
    <a class="button" type="button" href="{{ $url }}">{{ $buttonText }}</a>

</body>

</html>
