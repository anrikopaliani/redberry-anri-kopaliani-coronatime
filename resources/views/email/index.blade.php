<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700;800;900&display=swap');

        body {
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            font-family: 'Inter';
        }

        img {
            margin: 20px;
        }

        a {
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

        @media (max-width: 700px) {
            img {
                width: 70%;
                height: 40%;
            }
        }
    </style>

</head>

<body>
    <img src="{{ URL::asset('images/email-image.png') }}" alt="">
    <h1>Confirmation email</h1>
    <p>click this button to verify your email</p>
    <a href="{{ $url }}">VERIFY EMAIL</a>

</body>

</html>
