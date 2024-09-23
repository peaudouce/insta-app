<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        body {
            background-color:aquamarine;
        }

        .h1 {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            color: darkorchid;
        }

        .container {
            width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: antiquewhite;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        }

    </style>   
</head>
<body>
    <div class="container">
        <p class="h1">Welcome, {{ $name }}!</p>
        <p>Thank you for registering at Kredo IG.</p>
        <p>To get started, visit the website <a href="{{ $appURL }}">here</a>.</p>
    </div>
</body>
</html>