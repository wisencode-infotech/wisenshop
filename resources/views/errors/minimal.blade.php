<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #fcfcfc;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .error-container {
            width: 400px;
            padding: 30px;
            border: 1px solid #f0f0f0;
            border-radius: 8px;
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .logo {
            width: 160px;
            margin: 0 auto 20px;
        }

        .error-code {
            font-size: 58px;
            font-weight: bold;
            color: #495057;
            margin-bottom: 10px;
        }

        .error-message {
            font-size: 14px;
            color: #6c757d;
            margin-bottom: 20px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .back-link {
            text-decoration: none;
            color: #0a3768;
            font-weight: 600;
        }

        .back-link:hover {
            text-decoration: none;
            color: rgb(17, 150, 94);
        }
    </style>
</head>

<body>
    <div class="error-container">
        <img src="{{ __setting('header_logo') }}" alt="Site Logo" class="logo">

        <div class="error-code">
            @yield('code', '404')
        </div>

        <div class="error-message">
            @yield('message', 'Page Not Found')
        </div>

        <a href="{{ url('/') }}" class="back-link">Go Back to Homepage</a>
    </div>
</body>

</html>
