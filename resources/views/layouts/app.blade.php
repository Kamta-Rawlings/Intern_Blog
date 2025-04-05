<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Default Title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
    <header class="header-bar mb-3">
        <div class="container d-flex flex-column flex-md-row align-items-center p-3">
            <h4 class="my-0 mr-md-auto font-weight-normal"><a href="/" class="text-white">OurApp</a></h4>
        </div>
    </header>

    <div class="container mt-5">
        @yield('content')
    </div>

    <footer class="border-top text-center small text-muted py-3">
        <p class="m-0">Copyright &copy; 2025 <a href="/" class="text-muted">OurApp</a>. All rights reserved.</p>
    </footer>
</body>
</html>
