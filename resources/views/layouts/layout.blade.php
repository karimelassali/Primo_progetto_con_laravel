<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TodoListapp</title>
    @vite('resources/css/app.css')
</head>
<body>
    <x-nav-bar />
    <div class="h-full w-full ">
        @yield('content')
    </div>

    @yield('scripts')
</body>
</html>