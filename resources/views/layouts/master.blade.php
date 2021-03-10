<!DOCTYPE html>
<html> 
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="/css/app.css" rel="stylesheet">
    <title>@yield('title') - page</title>
</head>
<body>
    <div class="background"></div>
<main class="py-4">
@yield('content')
</main>
</body>
</html>