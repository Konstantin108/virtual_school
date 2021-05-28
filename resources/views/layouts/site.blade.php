<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/4bd251a57a.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Виртуальная школа</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
<div class="wrapper">
    <div class="top">
        <header></header>

        @yield('content')

    </div>
    <footer></footer>
</div>
</body>
</html>
