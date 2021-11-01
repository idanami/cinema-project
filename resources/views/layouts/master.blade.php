<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title') - page</title>
    <link href="/css/all.css" rel="stylesheet">
    {{-- <link href="http://cinema-project//css/all.css" rel="stylesheet"> --}}
</head>
<body>
    <div class="background"></div>
    <div class="main_header">
        @if(session()->get('LoggedUser'))
            <a href="logout">Logout</a>
        @elseif(!(session()->get('LoggedUser')))
            <a href="login">Login</a>
            <a href="register">Register</a>
        @endif
    </div>
<main class="py-4">
@yield('content')
</main>
</body>
</html>
