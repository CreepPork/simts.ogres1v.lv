<!DOCTYPE html>
<html lang="lv">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Drīz būsim atpakaļ! - Ogres 1. vidusskola</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <style>
            html,
            body {
                width: 100%;
                height: 100%;
            }

            body {
                display: flex;
                justify-content: center;
                align-items: center;
                margin-bottom: 0;
            }

            .wrapper {
                min-height: 0;
            }
        </style>

        <div class="wrapper container text-center">
            <i class="fas fa-wrench fa-4x text-primary mb-3"></i>

            <h1>Mēs veicam apkalpi mājas lapai!</h1>

            <h3>{{ $exception->getMessage() }}</h3>
        </div>

        <script async defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script>
    </body>
</html>
