<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700;800;900&display=swap');

        h1 {
            font-size: 25px;
        }

        p {
            font-size: 18px;
        }

        a {
            display: block;
            margin: auto;
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

        @media only screen and (max-width: 600px) {
            h1 {
                font-size: 20px;
            }

            p {
                font-size: 16px;
            }
        }
    </style>

</head>

<div style="font-family: 'Inter';">
    <img style="display: block; margin:auto; width: 60%; height:40%; margin-top: 20px;"
        src="{{ URL::asset('images/email-image.png') }}" alt="">
    <br />
    <h1 style="text-align: center;">{{ $title }}</h1>
    <br />
    <p style="text-align:center;">{{ $description }}</p>
    <br />
    <a style="color:white;font-weight:bolder;text-decoration:none;" type="button"
        href="{{ $url }}">{{ $buttonText }}</a>

</div>

</html>
